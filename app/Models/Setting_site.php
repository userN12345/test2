<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting_site extends Model
{
    protected $guarded = [];

    public static function tax(){
        return self::pluck('tax')->first();

    }

    public static function email_site(){
        return self::pluck('email')->first();

    }

    public static function phone_site(){
        return self::pluck('phone')->first();

    }

    public static function title_site(){
        return self::pluck('title_site')->first();

    }

}
