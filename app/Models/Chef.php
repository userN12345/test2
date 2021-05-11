<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Meal;

class Chef extends Model
{
    protected $guarded = [];

    public function meals(){
        return $this->hasMany(Meal::class);
    }
}
