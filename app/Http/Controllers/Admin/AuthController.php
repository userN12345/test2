<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Auth;
use App\Traits\UserTrait;
use App\Http\Requests\AuthRequest;


class AuthController extends Controller
{
    use UserTrait;

    public function index_auth(){
        $users = User::orderBy('id','desc')->paginate(8);
        return view('admins.auth.index_auth',compact('users'));
    }

    public function create_auth(){
        return view('admins.auth.create_auth');
    }

    public function create_auth_store(AuthRequest $req){
        $file_name = $this->UserTrait($req->image,'upload_image/users');
        $users = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'role' => $req->role,
            'image' => $file_name,
            

        ]);
      
        return redirect()->route('index_auth')->with('message','the auth is created');
    }

    public function update_auth($id){
        $users = User::findOrFail($id);
        return view('admins.auth.update_auth',compact('users'));        
    }

    public function update_auth_store(AuthRequest $req, $id){
        $users = User::findOrFail($id);
        $file_name = $this->UserTrait($req->image,'upload_image/users');
        $users->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'role' => $req->role,
            'image' => $file_name,

        ]);
      
        return redirect()->route('index_auth')->with('message','the auth is updated');
    }

    public function delete_auth($id){
        $users = User::findOrFail($id)->delete();
        return redirect()->back()->with('message','the auth is deleted');
    }

    public function block_auth($id){
         $users = User::findOrFail($id)->update(['block'=>True]);
        // dd($users);
        return redirect()->back()->with('message','the auth is blocked');
    }

    public function unblock_auth($id){
        $users = User::findOrFail($id)->update(['block'=>False]);
       // dd($users);
       return redirect()->back()->with('message','the auth is unblocked');
   }
}         