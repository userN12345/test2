<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Chef;
use App\Http\Requests\ChefRequest;
use App\Traits\ChefTrait;


class ChefController extends Controller
{
    use ChefTrait;

    public function index_chefs(){
        $chefs = Chef::all();
        return response()->json([$chefs],200);
    }

    public function create_chefs(ChefRequest $req){
        $file_name = $this->ChefTrait($req->image,'upload_image\admin\Chefs');
        $chefs = Chef::create([
            'name' => $req->name,
            'content' => $req->content,
            'image' => $file_name
        ]);
        return response()->json([$chefs],200);
    }

    public function update_chefs(ChefRequest $req, $id){
        $chefs = Chef::find($id);
        if(is_null($chefs)){
            return response()->json(['the chef is not fount']);
        }
        $file_name = $this->ChefTrait($req->image,'upload_image\admin\Chefs');
        $chefs->update([
            'name' => $req->name,
            'content' => $req->content,
            'image' => $file_name
        ]);
        return response()->json([$chefs],404);
    }

    public function chef_details($id){
        $chefs = Chef::find($id);
        if(!$chefs){
            return response()->json(['the chefs is not fount'],404);
        }
        return response()->json([$chefs],404);
    }

    public function delete_chef($id){
        $chefs = Chef::find($id);
        if(!$chefs){
            return response()->json(['the chef is not fount !!'],404);
        }
        $chefs->delete();
        return response()->json(['the chef is deleted !!'],200);
    }
}
