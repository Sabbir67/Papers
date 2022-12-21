<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\JournalsImage;
use App\Models\User;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Storage;

class AuthorJournalController extends Controller
{

    public function index(){
        //$user_id = auth()->user()->id;
        $journals = Journal::latest()->get();
         //dd(auth()->guard('web')->check());
        return view('journal.journal')->with('journals',$journals);
    }
    public function create(){
        $categories = Category::all();
        return view('journal.journalCreate')->with('categories',$categories);

    }
    public function store(Request $request)
    {
        $journal = new Journal;
        $journal->title = $request->input('title');
        $journal->abstract = $request->input('abstract');
        //$journal->keywards = $request->input('keywards');
        $journal->keywards = strtolower($request->keywords);
        //dd($request->keywords);
        $journal->jdate = $request->input('jdate');
        $journal->a1fname = $request->input('a1fname');
        $journal->a1lname = $request->input('a1lname');
        $journal->student_id = $request->input('student_id');
        $journal->department = $request->input('department');
        $journal->session = $request->input('session');
        $journal->year = $request->input('year');
        $journal->category_id = $request->category_id;
        $journal->save();

        $journalId = $journal->id;
        //dd($journal->user_id);

        //handle pdf upload
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            //get file name with extension
            $takeFile = $pdf->getClientOriginalName();
            //get just file name
            $filenameSub = str_replace(' ','-',$takeFile);
            $filename = pathinfo($filenameSub, PATHINFO_FILENAME);
            //get just extension
            $extension = $pdf->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'.'.$extension;
            //upload images
            $path = $pdf->storeAs("public/journals/".$journalId, $fileNameToStore);
            $journals = new JournalsImage;
            $journals->journal_id = $journalId;
            $journals->pdf = $path;
            $journals->save();
        }
      //handle doc upload

      return redirect('/admin/journals/create')->with('success', 'Journal is submitted. We will let you know if reviewer response.');

    }

    public function show($id)
    {
        $id_d = (int)$id;
       // \DB::enableQueryLog();
       // $journals = DB::table('journals')
       // ->join('journals_images','journals.id','=','journals_images.journal_id')
        //->select("*");
        //->where('journals.id','=','1');

       // $pdf = Storage::url($journal->pdf);
      // $journal = Journal::with('journalsImage')->get();
      //$journal = Journal::join('journals_images','journals_images.journal_id','=','journals.id')->where('journals.id','=',1)->get();
      //$journal = JournalsImage::join('journals','journals.id','=','journals_images.journal_id')->where('journals.id',$id)->get();
      $journal = Journal::find($id);
      $journal_pdf = JournalsImage::where('journal_id','=',$id_d)->get()->first();
     //dd($id);
      //  dd($journal_pdf->pdf,\DB::getQueryLog());
      $pdf = Storage::url($journal_pdf->pdf);
    //   dd($pdf);
        return view('journal.single')->with('journal',$journal)->with('pdf',$pdf);
    }

}
