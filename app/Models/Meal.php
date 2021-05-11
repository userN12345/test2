<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Chef;
use App\Models\MealOrder;

class Meal extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function chef(){
        return $this->belongsTo(Chef::class);
    }


    public function order_meals(){
        return $this->hasMany(MealOrder::class);
    }

}

