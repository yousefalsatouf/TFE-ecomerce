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
            'name' => 'admin',
            'first_name' => 'Yousef',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('admin'),
            'admin' => 1,
        ]);

        User::create([
            'name' => 'actor',
            'first_name' => 'actor',
            'email' => 'actor@actor.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('actor'),
            'actor' => 1,
        ]);

        User::create([
            'name' => 'user',
            'first_name' => 'Yousef',
            'email' => 'user@user.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('user'),
        ]);
    }
}
