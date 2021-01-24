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
            'name' => 'yousef',
            'first_name' => 'Yousef',
            'first_name' => 'Alsatouf',
            'email' => 'yousef@sportclub.be',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('admin123456'),
            'admin' => true,
        ]);

        User::create([
            'name' => 'david',
            'first_name' => 'David',
            'first_name' => 'Louis',
            'email' => 'david@sportclub.be',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('actor123456'),
            'actor' => true,
        ]);

        User::create([
            'name' => 'louis',
            'first_name' => 'Louis',
            'first_name' => 'David',
            'email' => 'louis@sportclub.be',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('user123456'),
        ]);
    }
}
