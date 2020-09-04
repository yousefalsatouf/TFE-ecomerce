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
           'name' => 'sportClub - Wallo',
           'address' => 'rue en bois',
            'city' => 'Liège',
            'state' => 'Liege',
            'hours' => '9:00am - 6:00pm',
            'lat' => 50.6461,
            'lng' => 5.5711,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('locations')->insert([
            'name' => 'sportClub - Bruss',
            'address' => 'rue en bois',
            'city' => 'Brussels',
            'state' => 'Brussels',
            'hours' => '9:00am - 6:00pm',
            'lat' => 50.845539,
            'lng' => 4.355710,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('locations')->insert([
            'name' => 'sportClub - Anvers',
            'address' => 'rue en bois',
            'city' => 'Anvers',
            'state' => 'Anvers',
            'hours' => '9:00am - 6:00pm',
            'lat' => 51.220558,
            'lng' => 4.399310,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
