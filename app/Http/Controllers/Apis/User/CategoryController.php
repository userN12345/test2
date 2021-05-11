<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Meal;
use App\Models\Category;
class CategoryController extends Controller
{
    public function category($id){
        $categories = Category::find($id);
        if(!$categories){
            return response()->json(['the category is not fount !!'],404);
        }
        $meals = Meal::where('category_id',$categories->id)->get();

        return response()->json([$meals],200);
    }
}
