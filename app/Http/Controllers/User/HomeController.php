<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Meal;
use App\Models\Chef;
use App\Models\Order;
use App\Models\Reservation;
use App\User;
use App\Http\Requests\ReservationRequest;
use Auth;

class HomeController extends Controller
{
    public function home_site(){
        $meals = Meal::paginate(6);
        $chefs = Chef::paginate(4);
        $orders = Order::get();
        $users = User::get();
        return view('users.pages.home',compact('meals','chefs','users','orders'));
    }

    public function create_reservation_store(ReservationRequest $req){
        
        $reservations = Reservation::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'date' => $req->date,
            'time' => $req->time,
            'num_chair' => $req->num_chair,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->back()->with('message','Reservation is send !!');
    }

    public function my_reservation(){
        $reservations = Reservation::where('user_id',Auth::user()->id)->get();
        return view('users.pages.my_reservation',compact('reservations'));
    }

    public function cancel_reservation($id){
        $reservations = Reservation::FindOrFail($id)->update(['status'=>False]);
        return redirect()->back()->with('message','the Reservation is Cancel !!');
    }
}
