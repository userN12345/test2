<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index_reservation(){
        $reservaions = Reservation::orderBy('id','desc')->paginate(5);
        return view('admins.reservations.reservation',compact('reservaions'));
    }

    public function delete_reservation($id){
        $reservaions = Reservation::findOrFail($id)->delete();
        return redirect()->back()->with('message_delete','the reservation is deleted !!');
    }
}
