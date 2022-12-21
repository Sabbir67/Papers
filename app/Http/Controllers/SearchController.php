<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Meilisearch\Client;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = new Client('https:://127.0.0.1:7700');
        $client->index('journal_index')->updateSettings([
        'sortableAttributes' => 'created_at'
       ]);
      //$sort =  $client->getSortableAttributes();
       // dd($sort);
        $result = null;
        if($query = $request->get('query')){
            $result = Journal::search($query)
            ->orderBy('created_at','DESC')
            ->get();
        }
        return view('search',compact('result'));
    }
}
