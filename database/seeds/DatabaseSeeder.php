<?php

use App\Recommends;
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
        // locations seeder
        $this->call(LocationsSeeder::class);
        // reviews
        $this->call(ReviewsSeeder::class);
        // recommended
        $this->call(RecommendsSeeder::class);
        // products props
        $this->call(ProductPropsSeeder::class);
        // comments props
        $this->call(CommentsSeeder::class);
    }
}
