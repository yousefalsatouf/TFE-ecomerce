<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => "admin",
            'image' => 'yousef.jpg',
            'email' => 'admin@ecom.com',
            'email_verified_at' => '2020-07-19 16:11:27',
            'password' => 'admin',
            'first_name' => 'yousef',
            'last_name' => 'alsatouf',
            'phone_number' => '44444444',
            'state' => 'liege',
            'city' => 'liege',
            'postal_code' => 4000,
            'admin' => 1
        ]);

        User::create([
            'name' => "actor",
            'image' => 'yousef.jpg',
            'email' => 'actor@ecom.com',
            'email_verified_at' => '2020-07-19 16:11:27',
            'password' => 'actor',
            'first_name' => 'yousef',
            'last_name' => 'alsatouf',
            'phone_number' => '44444444',
            'state' => 'liege',
            'city' => 'liege',
            'postal_code' => 4000,
            'actor' => 1
        ]);
    }
}
