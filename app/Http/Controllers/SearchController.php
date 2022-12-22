<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Meilisearch\Client;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {

      //$sort =  $client->getSortableAttributes();
       // dd($sort);
        $result = null;
        if($query = $request->get('query')){
            $result = Journal::search($query)
            ->orderBy('created_at','DESC')
            ->paginate(10);

        }
        //return view('search',compact('result'));
        return json_encode($result);
    }
}
