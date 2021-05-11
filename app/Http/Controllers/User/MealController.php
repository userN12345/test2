<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Meal;
use Cart;
use Auth;

class MealController extends Controller
{
    public function AddMeal($id){
        $meal = Meal::FindOrFail($id);
            $cartItem = \Cart::session(Auth::user()->id)->add([
                'id' => $meal->id,
                'name' => $meal->title,
                'price' => $meal->price,
                'quantity' => 1,
                ]);
            // dd($meal);
        return redirect()->back()->with('message','the order is send');
    }

    public function cart_show(){
        $items = Cart::session(Auth::user()->id)->getContent();
        return view('users.pages.shopping_cart',compact('items'));
    }

    public function cart_update($id){
        Cart::session(Auth::user()->id)->update($id,[
            'quantity' => +1,
        ]);
        return redirect()->back();
    }

    public function cart_update_m($id){
        Cart::session(Auth::user()->id)->update($id,[
            'quantity' => -1,
        ]);
        return redirect()->back();
    }

    public function cart_delete($id){
         Cart::session(Auth::user()->id)->remove($id); 
        return redirect()->back();
    }
}
