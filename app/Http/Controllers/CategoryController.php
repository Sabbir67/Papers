<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Journal;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category')->with('category',$category);
    }
    public function show($id)
    {
        $journals = Journal::with('category')->where('category_id',$id)->get();

        $journal_key = array();
        foreach($journals as $journal)
        {
           // $journal_key = array();
            array_push($journal_key,$journal->keywards);
           // print_r($journal_key);

        }

        return view('categoryShow',compact('journal_key'));

    }
}
