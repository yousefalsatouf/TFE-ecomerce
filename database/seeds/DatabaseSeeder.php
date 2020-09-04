<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // category seeder ...
        $this->call(CategorySeeder::class);
        // product seeder ...
        $this->call(ProductSeeder::class);
        // User seeder
        $this->call(UserSeeder::class);
        // Gallery product images
        $this->call(productImagesSeeder::class);
        // Ads
        $this->call(AdsSeeder::class);
        // locations seeder
        $this->call(LocationsSeeder::class);
    }
}
