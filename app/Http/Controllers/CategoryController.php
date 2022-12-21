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
           $key = strtolower(ltrim($journal->keywards));
          // var_dump($key);
            $keywords = explode(',',$key);

            array_push($journal_key,$keywords);
           // print_r($journal_key);

        }
        $one_d_array = call_user_func_array('array_merge',$journal_key);
        $key2 = array_map('trim',$one_d_array);
        $keys = array_unique($key2);

        //dd($keys);

        return view('categoryShow',compact('keys'));

    }
}
