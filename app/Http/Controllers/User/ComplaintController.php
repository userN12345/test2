<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Complaint;
use Auth;

class ComplaintController extends Controller
{
    public function complaints(){

        return view('users.pages.complaints');
    }

    public function create_complaints(Request $req){
        $complaints = $req->validate([
            'content' => 'required',
            
        ]);
        $complaints = Complaint::create([
            'content' => $req->content,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->back()->with('message','the Complaints is Send !!');
    }
}
