<?php

use Illuminate\Database\Seeder;

class ProductPropsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Products_properties::create([
            'product_id' => 17,
            'size' => "S M L XL XXL",
            'color' => "space gris",
            'mark' => 'H&m',
        ]);
        \App\Products_properties::create([
            'product_id' => 18,
            'size' => "S M L XL XXL",
            'color' => "gray",
            'mark' => 'H&m',
        ]);
        \App\Products_properties::create([
            'product_id' => 19,
            'size' => "S M L XL XXL",
            'color' => "black",
            'mark' => 'H&m',
        ]);
        \App\Products_properties::create([
            'product_id' => 20,
            'size' => "S M L XL XXL",
            'color' => "white",
            'mark' => 'H&m',
        ]);
    }
}
