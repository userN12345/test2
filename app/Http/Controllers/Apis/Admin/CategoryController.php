<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function category_index(){
        $categories = Category::all();
        return response()->json([$categories],200);
    }

    public function create_category(CategoryRequest $req){
        $categories = Category::create($req->all());
        return response()->json([$categories],200);
    }

    public function update_category(CategoryRequest $req, $id){
        $categories = Category::find($id);
        if(!$categories){
            return response()->json(['the category is not found'],200);
        }
        $categories->update($req->all());
        return response()->json([$categories],200);
    }

    public function delete_category($id){
        $categories = Category::find($id)->delete();
        if(!$categories){
            return response()->json(['no'],200);            
        }
        return response()->json([$categories],200);
    }

}
