<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function category_index(){
        $categories = Category::all();
        return view('admins.categories.category',compact('categories'));
    }

    public function create_category(){

        return view('admins.categories.create_category');
    }

    public function create_category_store(CategoryRequest $req){
        $categories = Category::create($req->all());
        return redirect()->route('category_index')->with('message','the category is created !!');
    }

    public function update_category($id){
        $categories = Category::findOrFail($id);
        return view('admins.categories.update_category',compact('categories'));
    }

    public function update_category_store(CategoryRequest $req, $id){
        $categories = Category::findOrFail($id);
        $categories->update($req->all());
        return redirect()->route('category_index')->with('message','the category is updated !!');
    }

    public function delete_category($id){
        $categories = Category::find($id)->delete();
        return redirect()->back()->with('message','the category is deleted !!');
    }
}
