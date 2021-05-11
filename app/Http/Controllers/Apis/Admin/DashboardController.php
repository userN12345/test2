<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Order;
use App\Models\Meal;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Complaint;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = User::get();
        $orders = Order::get();
        $meals = Meal::get();
        $categories = Category::get();
        $chefs = Chef::get();
        $complaints = Complaint::get();
        $reservations = Reservation::get();
        return response()->json([
            'users'        => $users,
            'orders'       => $orders,
            'meals'        => $meals,
            'categories'   => $categories,
            'chefs'        => $chefs,
            'complaints'   => $complaints,
            'reservations' => $reservations
        ],200);
    }
}
