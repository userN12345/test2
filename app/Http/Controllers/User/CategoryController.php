<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

 use App\Models\Category;
 use App\Models\Meal;

class CategoryController extends Controller
{

    public function category($id){
        $categories = Category::findOrFail($id);
        $meals = Meal::where('category_id',$categories->id)->get();
        return view('users.pages.category',compact('meals','categories'));
    }
    




}
