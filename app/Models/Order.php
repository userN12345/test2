<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\MealOrder;

class Order extends Model
{
    protected $guarded = [];



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order_meals(){
        return $this->hasMany(MealOrder::class);
    }

}
