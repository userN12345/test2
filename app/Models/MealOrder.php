<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Meal;
use App\Models\Order;

class MealOrder extends Model
{
    protected $table = 'meal_orders';
    protected $guarded = [];

    public function meal(){
        return $this->belongsTo(Meal::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
    
}
