<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Journal;
use App\Models\JournalsImage;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
class HomeController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $journals = DB::table('journals')
                        ->join('journals_images','journals.id','=','journals_images.journal_id')
                        ->select('journals.created_at as jcreated_at',
                        'journals.title as jtitle','journals_images.image as image',
                        'journals.id as id','journals.abstract as abstract',
                        'journals.keywards as keywards',
                        'journals.a1fname as a1fname',
                        'journals.a1lname as a1lname',
                        'journals.session as session',
                        'journals.year as year',
                        'journals.department as department')

                        ->orderBy('journals.created_at','desc')
                        ->paginate(12);
                        //dd($journals[0]);
        // $users = DB::table('users')
        //             ->select('users.name as uname',
        //                 'users.image as uimage');
        $journal = Journal::all();
        $journal_key = array();
        foreach($journals as $journal)
        {
           // $journal_key = array();
           $key = strtolower(ltrim($journal->keywards));
          // var_dump($key);
            $keywords = explode(',',$key);

            array_push($journal_key,$keywords);
           // print_r($journal_key);

        }
        $one_d_array = call_user_func_array('array_merge',$journal_key);
        $key2 = array_map('trim',$one_d_array);
        $keys = array_unique($key2);
        $key = array_filter($keys);
    //    dd($key);
        return view('welcome',compact('category','journals','key'));
    }
    public function category()
    {
        $category = Category::all();
        return view('category')->with('category',$category);
    }
    public function aboutus()
    {
        $category = Category::all();
        return view('aboutus')->with('category',$category);
    }
    public function instruction()
    {
        $category = Category::all();
        return view('instructions')->with('category',$category);
    }
    public function editorialmember()
    {
        $category = Category::all();
        return view('editorialmember')->with('category',$category);
    }
    public function paperview($id)
    {
        $id_d = (int)$id;
        $journal = Journal::find($id);
        $journal_pdf = JournalsImage::where('journal_id','=',$id_d)->get()->first();
       //dd($id);
        //  dd($journal_pdf->pdf,\DB::getQueryLog());
        $pdf = Storage::url($journal_pdf->pdf);
        return view('paperview')->with('journal',$journal)->with('pdf',$pdf);
    }
    public function allpapers()
    {
        $category = Category::all();
        $journals = DB::table('journals')
                        ->join('journals_images','journals.id','=','journals_images.journal_id')
                        ->select('journals.created_at as jcreated_at',
                        'journals.title as jtitle','journals_images.image as image',
                        'journals.id as id','journals.abstract as abstract',
                        'journals.keywards as keywards',
                        'journals.a1fname as a1fname',
                        'journals.a1lname as a1lname',
                        'journals.session as session',
                        'journals.year as year',
                        'journals.department as department')
                        ->orderBy('journals.created_at','desc')->get();


                       // dd($journals);
        return view('allpapers')->with('journals',$journals)->with('category',$category);
    }
}
