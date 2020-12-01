<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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

            'name' => 'Alsatouf',
            'first_name' => 'Yousef',
            'email' => 'yousef@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('admin'),
            'admin' => 1,
        ]);
    }
}
