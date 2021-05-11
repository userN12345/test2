<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Meal;
use App\Models\MealOrder;
use App\User;
class OrderController extends Controller
{
    public function order(){
        $users = User::first();
        $orders = Order::orderBy('id','desc')->paginate(5);
        $meals = Meal::get();
        return view('admins.orders.orders',compact('users','orders','meals'));
    }

    public function details_order($id){
        $orders = Order::findOrFail($id);
        $meal_orders = MealOrder::where('order_id',$orders->id)->get();
        return view('admins.orders.order_details',compact('meal_orders'));

    }

    public function cansel_status_order($id){
        $meal_orders = Order::findOrFail($id)->update(['status'=>False]);
        return redirect()->back(); 
    }

    public function confirm_status_order($id){
        $meal_orders = Order::findOrFail($id)->update(['status'=>True]);
        return redirect()->back(); 
    }
    

}
