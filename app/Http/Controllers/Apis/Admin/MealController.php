<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Meal;
use App\models\Category;
use App\models\Chef;
use App\Http\Requests\MealRequest;
use App\Traits\MealTrait;
use Auth;

class MealController extends Controller
{
    use MealTrait;

    public function index_meal(){
        $meals = Meal::all();
        return response()->json([$meals],200);
    }


    public function create_meal(MealRequest $req){
        $file_name = $this->MealTrait($req->image,'upload_image/admin/meals');
        $meals = Meal::create([
            'title' => $req->title,
            'image' => $file_name,
            'price' => $req->price,
            'slug' => $req->title,
            'category_id' => $req->category_id,
            'chef_id' => $req->chef_id,


        ]);

        return response()->json([$meals],200);
    }

    
    public function update_meal(MealRequest $req, $id){
        $meals = Meal::find($id);
        if(!$meals){
            return response()->json(['the meal is not fount !!'],404);
        }
        $file_name = $this->MealTrait($req->image,'upload_image/admin/meals');
        $meals->update([
            'title' => $req->title,
            'image' => $file_name,
            'price' => $req->price,
            'slug' => $req->title,
            'category_id' => $req->category_id,
            'chef_id' => $req->chef_id,

        ]);
        return response()->json([$meals],404);
    }

    public function details_meal($slug){
        $meals = Meal::where('slug',$slug)->first();
        if(!$meals){
            return response()->json(['the meal is not fount !!'],404);
        }
        return response()->json([$meals],200);
    }

    public function delete_meal($id){
        $meals = Meal::find($id);
        if(!$meals){
            return response()->json(['the meal is not fount !!'],404);
        }
        return response()->json(['the meal is deleted !!'],200);
    }
}
