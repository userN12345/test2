<?php

use Illuminate\Database\Seeder;

use App\Models\Setting_site;

class Setting extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting_site::create([
            'title_site' => 'Feliciano',
            'phone' => '01118724682',
            'email' => 'www.resturant.com',
            'tax' => 4
            
        ]);
    }
}
