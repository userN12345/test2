<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Traits\UserTrait;
use App\Http\Requests\AuthRequest;

class UserController extends Controller
{
    use UserTrait;

    public function index_auth(){
        $users = User::all();
        return response()->json([$users],404);
   }

   public function Add_auth(AuthRequest $req){

    $file_name = $this->UserTrait($req->image,'upload_image/users');
    $users = User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => bcrypt($req->password),
        'phone' => $req->phone,
        'role' => $req->role,
        'image' => $file_name,
        

    ]);
  
    return response()->json([$users],204);;
    }


    public function update_auth(AuthRequest $req, $id){

        $users = User::find($id);
        if(is_null($users)){
            return response()->json(['the user is not fount !!'],404);
        }
        

        $file_name = $this->UserTrait($req->image,'upload_image/users');
        $users->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'role' => $req->role,
            'image' => $file_name,

        ]);
    
        return response()->json([$users],204);
    }

    public function delete_auth($id){
        $users = User::find($id);
        if(!$users){
            return response()->json(['the user is not found'],200);
        }
        $users->delete();
        
        return response()->json(['the user is deleted !!'],200);
    }

}
