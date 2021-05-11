<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function order(){
        $orders = Order::all();
        return response()->json([$orders],200);
    }


    public function order_delete($id){
        $orders = Order::find($id);
        if(!$orders){
            return response()->json(['the order is not fount !!'],404);
        }
        return response()->json(['the order is deleted !!'],200);
    }
}
