<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index_reservation(){
        $reservaions = Reservation::all();
        return response()->json([$reservaions],200);
    }

    public function delete_reservation($id){
        $reservaions = Reservation::find($id);
        if(!$reservaions){
            return response()->json(['the reservation is not fount !!'],404);
        }
        $reservaions->delete();
        return response()->json(['the reservation is deleted !!'],404);
    }
}
