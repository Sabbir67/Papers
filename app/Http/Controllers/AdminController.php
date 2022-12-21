<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Reviewer;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $userShow = User::count();
        $journalShow = Journal::count();
       

        return view('admin.dashborad',compact('userShow','journalShow','reviewerShow'));
    }

    public function pending()
    {
        $journals = Journal::where('status',false)->get();
        return view('admin.pendingJournals',compact('journals'));
    }
    public function approve ($id)
    {
        $journal =Journal::find($id);
       // dd($journal->title);
        if($journal->status == false){
            $journal->status = true;
            $journal->save();
            return redirect()->back();
        }
        return redirect()->back();

    }
}
