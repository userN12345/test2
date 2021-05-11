<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MealOrder;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\Setting_site;

class OrderUserController extends Controller
{
    public function add_order(){
        $order_meals = MealOrder::get();
        $my_carts = \Cart::session(Auth::user()->id)->getContent();
        return view('users.pages.create_order',compact('my_carts','order_meals'));
    }

    public function add_order_store(Request $req){
  
        // dd(\Cart::session(Auth::user()->id)->getContent());
         $req->validate([
             'size' => 'required',
             'city' => 'required',
             'address' => 'required',
         ]);
        //  Cart::session($userId)->get($itemId)
        $order = Order::create([
            'city'    => $req->city,
            'address' => $req->address,
            'user_id' => Auth::user()->id,
        ]);

        // Insert into order_meal table
        foreach (\Cart::session(Auth::user()->id)->getContent() as $item) {
            MealOrder::create([
                'price'         => $item->price,
                'size'          => $req->size,
                'tax'           =>  Setting_site::tax(), 
                'total_price'   => \Cart::getTotal(), //هاتلي من السيشن اجمالي السعر

                'order_id'      => $order->id,
                'meal_id'       => $item->id,
                'quantity'      => $item->quantity,
            ]);

        }
        \Cart::clear(); // امسح السيشن
        return redirect()->route('cart_show')->with('message','Order Created Successfully.');
    }

    public function my_order(){
         $orders = Order::where('user_id',Auth::user()->id)->get();
         return view('users.pages.my_order',compact('orders'));
    }

    public function my_order_details($id){
        $orders = Order::findOrFail($id);
        $meal_orders = MealOrder::where('order_id',$orders->id)->get();
        return view('users.pages.my_order_details',compact('meal_orders'));
    }

    public function order_delete($id){
        $orders = Order::findOrFail($id)->delete();
        return redirect()->back()->with('message','the order is deleted !!');
    }

}
