<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Chef;
use App\Http\Requests\ChefRequest;
use App\Traits\ChefTrait;

class ChefController extends Controller
{
    use ChefTrait;

    public function index_chefs(){
        $chefs = Chef::orderBy('id','desc')->paginate(10);
        return view('admins.chefs.index_chef',compact('chefs'));
    }

    public function create_chefs(){
        return view('admins.chefs.create_chef');
    }

    public function create_chefs_store(ChefRequest $req){
        $file_name = $this->ChefTrait($req->image,'upload_image\admin\Chefs');
        Chef::create([
            'name' => $req->name,
            'content' => $req->content,
            'image' => $file_name
        ]);
        return redirect()->route('index_chefs')->with('message','the cahef is created !!');
    }

    public function update_chef($id){
        $chefs = Chef::findOrFail($id);
        return view('admins.chefs.update_chef',compact('chefs'));
    }

    public function update_chefs_store(ChefRequest $req, $id){
        $chefs = Chef::findOrFail($id);
        $file_name = $this->ChefTrait($req->image,'upload_image\admin\Chefs');
        $chefs->update([
            'name' => $req->name,
            'content' => $req->content,
            'image' => $file_name
        ]);
        return redirect()->route('index_chefs')->with('message','the chef is updated');
    }

    public function chef_details($id){
        $chefs = Chef::findOrFail($id);
        return view('admins.chefs.chef_details',compact('chefs'));
    }

    public function delete_chef($id){
        $chefs = Chef::findOrFail($id)->delete();
        return redirect()->back()->with('message','the chef is deleted');
    }
}
