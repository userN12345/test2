<?php

namespace App\Http\Controllers\Admin;

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
    
    public function meals(){
        $meals = Meal::OrderBy('id','desc')->paginate(5);
        return view('admins.meals.meals',compact('meals'));
    }

    public function create_meal(){
        $categories = Category::all();
        $chefs = Chef::all();
        $meals = Meal::get();
        return view('admins.meals.create_meal',compact('categories','chefs','meals'));
    }

    public function create_meal_store(MealRequest $req){
        $file_name = $this->MealTrait($req->image,'upload_image/admin/meals');
        $meals = Meal::create([
            'title' => $req->title,
            'image' => $file_name,
            'price' => $req->price,
            'slug' => $req->title,
            'category_id' => $req->category_id,
            'chef_id' => $req->chef_id,


        ]);
        return redirect()->route('meals')->with('message','the meal is created !!');

    }

    public function update_meal($id){
        $meals = Meal::findOrFail($id);
        $categories = Category::all();
        $chefs = Chef::all();
        return view('admins.meals.update_meal',compact('meals','categories','chefs'));
    }

    public function update_meal_store(MealRequest $req, $id){
        $meals = Meal::findOrFail($id);
        $file_name = $this->MealTrait($req->image,'upload_image/admin/meals');
        $meals->update([
            'title' => $req->title,
            'image' => $file_name,
            'price' => $req->price,
            'slug' => $req->title,
            'category_id' => $req->category_id,
            'chef_id' => $req->chef_id,

        ]);
        return redirect()->route('meals')->with('message','the meal is updated !!');
    }

    public function details_meal($slug){
        $meals = Meal::where('slug',$slug)->first();

        return view('admins.meals.details_meal',compact('meals'));
    }

    public function delete_meal($id){
        $meals = Meal::findOrFail($id)->delete();
        return redirect()->back()->with('message_delete','the meal is deleted !!');
    }
}
