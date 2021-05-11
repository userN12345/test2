<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'nour',
            'email' => 'nour@gmail.com',
            'password' => bcrypt('123'),
            'phone' => '0112323232',
            'role' => 'admin'
        ]);
    }
}
