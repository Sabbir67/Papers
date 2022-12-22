<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\JournalsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JournalController extends Controller
{

    public function index()
    {
        $journal = Journal::orderBy('created_at','desc')->paginate(5);
        return view('admin.journal.journal')->with('journal',$journal);
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
        return view('paperview')->with('journal',$journal)->with('pdf',$pdf);
    }
}
