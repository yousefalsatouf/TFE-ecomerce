<?php

use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Review::create([
            'client_name' => "someone",
            'client_email' => "someone@gmail.com",
            'review_content' => "perfect",
            'rating' => 4,
            'user_id' => 1,
            'product_id' => 1,
        ]);
        \App\Review::create([
            'client_name' => "anther one",
            'client_email' => "anther@gmail.com",
            'review_content' => "perfect",
            'rating' => 5,
            'user_id' => 1,
            'product_id' => 1,
        ]);
        \App\Review::create([
            'client_name' => "yousef",
            'client_email' => "yousefher@gmail.com",
            'review_content' => "good",
            'rating' => 3,
            'user_id' => 1,
            'product_id' => 1,
        ]);
    }
}
