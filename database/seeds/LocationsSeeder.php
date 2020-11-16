<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('locations')->insert([
           'title' => 'sportClub - Wallonie',
           'description' => 'this is some description about this store',
           'address' => 'rue en bois',
            'city' => 'Liège',
            'state' => 'Liege',
            'hours' => '9:00am - 6:00pm',
            'lat' => 50.6448444,
            'lng' => 5.5804934,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('locations')->insert([
            'title' => 'sportClub - Brussels',
            'description' => 'this is some description about this store',
            'address' => 'rue en bois',
            'city' => 'Brussels',
            'state' => 'Brussels',
            'hours' => '9:00am - 6:00pm',
            'lat' => 50.9208375,
            'lng' => 4.7999096,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
