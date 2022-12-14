<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\JournalsImage;
use App\Models\User;
use App\Models\Category;
use DB;

class AuthorJournalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('journal.journal')->with('journal',$user->journals);
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
        $journal->keywards = $request->keywords;
        //dd($request->keywords);
        $journal->jdate = $request->input('jdate');
        $journal->a1fname = $request->input('a1fname');
        $journal->a1lname = $request->input('a1lname');
        $journal->a1affiliation = $request->input('a1affiliation');
        $journal->a1email = $request->input('a1email');
        $journal->a2fname = $request->input('a2fname');
        $journal->a2lname = $request->input('a2lname');
        $journal->a2affiliation = $request->input('a2affiliation');
        $journal->a2email = $request->input('a2email');
        $journal->a3fname = $request->input('a3fname');
        $journal->a3lname = $request->input('a3lname');
        $journal->a3affiliation = $request->input('a3affiliation');
        $journal->a3email = $request->input('a3email');
        $journal->a4fname = $request->input('a4fname');
        $journal->a4lname = $request->input('a4lname');
        $journal->a4affiliation = $request->input('a4affiliation');
        $journal->a4email = $request->input('a4email');
        $journal->category_id = $request->category_id;
        $journal->user_id = auth()->user()->id;
        $journal->save();
        
        $journalId = $journal->id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $takeFile = $file->getClientOriginalName();
            $filename = pathinfo($takeFile,PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore1 = $filename.'.'.$extension;
            $path = $file->storeAs("journals/".$journalId,$fileNameToStore1);
            $journals = new JournalsImage;
            $journals->journal_id = $journalId;
            $journals->image = $path;
            $journals->save();
        }
        //handle pdf upload
    if ($request->hasFile('pdf')) {
        $pdf = $request->file('pdf');
            //get file name with extension
            $takeFile = $pdf->getClientOriginalName();
            //get just file name
            $filename = pathinfo($takeFile, PATHINFO_FILENAME);
            //get just extension
            $extension = $pdf->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'.'.$extension;
            //upload images
            $path = $pdf->storeAs("journals/".$journalId, $fileNameToStore);
      }
      //handle doc upload
      if ($request->hasFile('doc')) {
        $doc = $request->file('doc');
            //get file name with extension
            $takeFile = $doc->getClientOriginalName();
            //get just file name
            $filename = pathinfo($takeFile, PATHINFO_FILENAME);
            //get just extension
            $extension = $doc->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'.'.$extension;
            //upload images
            $path = $doc->storeAs("journals/".$journalId, $fileNameToStore);
      }
      return redirect('/journals/create')->with('success', 'Journal is submitted. We will let you know if reviewer response.');

    }
    public function show($id)
    {
        $journal = Journal::find($id);
        
        return view('journal.single')->with('journal',$journal);
    }

}
