<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class AccountController extends Controller
{
    public function update_account(){
        $users = User::all();
        return view('users.pages.update_account',compact('users'));
    }

    public function update_account_store(Request $req, $id){
       $users = User::findOrFail($id);
       $data = $req->validate([
         'name'     => 'required',
         'email'    => 'required|email|unique:users,email,'.$users->id,
         'password' => 'required',
         'phone'    => 'required'
       ]);
        $users->update([
            'name'     => $req->name,
            'email'    => $req->email,
            'password' => $req->password,
            'phone'    => $req->phone
        ]);
        return redirect()->route('home_site')->with('message','The Account Is Updated !!');
    }
}
