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
            'likes' => 0,
            'product_id' => 1,
        ]);
        \App\Review::create([
            'client_name' => "anther one",
            'client_email' => "anther@gmail.com",
            'review_content' => "perfect",
            'rating' => 5,
            'likes' => 0,
            'product_id' => 4,
        ]);
        \App\Review::create([
            'client_name' => "yousef",
            'client_email' => "yousefher@gmail.com",
            'review_content' => "good",
            'rating' => 3,
            'likes' => 0,
            'product_id' => 10,
        ]);
        \App\Review::create([
            'client_name' => "someone",
            'client_email' => "someone@gmail.com",
            'review_content' => "perfect",
            'rating' => 4,
            'likes' => 0,
            'product_id' => 9,
        ]);
        \App\Review::create([
            'client_name' => "anther one",
            'client_email' => "anther@gmail.com",
            'review_content' => "perfect",
            'rating' => 5,
            'likes' => 0,
            'product_id' => 12,
        ]);
        \App\Review::create([
            'client_name' => "yousef",
            'client_email' => "yousefher@gmail.com",
            'review_content' => "good",
            'rating' => 3,
            'likes' => 0,
            'product_id' => 8,
        ]);
        \App\Review::create([
            'client_name' => "someone",
            'client_email' => "someone@gmail.com",
            'review_content' => "perfect",
            'rating' => 4,
            'likes' => 0,
            'product_id' => 15,
        ]);
        \App\Review::create([
            'client_name' => "anther one",
            'client_email' => "anther@gmail.com",
            'review_content' => "perfect",
            'rating' => 5,
            'likes' => 0,
            'product_id' => 4,
        ]);
        \App\Review::create([
            'client_name' => "yousef",
            'client_email' => "yousefher@gmail.com",
            'review_content' => "good",
            'rating' => 3,
            'likes' => 0,
            'product_id' => 18,
        ]);
        \App\Review::create([
            'client_name' => "someone",
            'client_email' => "someone@gmail.com",
            'review_content' => "perfect",
            'rating' => 4,
            'likes' => 0,
            'product_id' => 22,
        ]);
        \App\Review::create([
            'client_name' => "anther one",
            'client_email' => "anther@gmail.com",
            'review_content' => "perfect",
            'rating' => 5,
             'likes' => 0,
            'product_id' => 11,
        ]);
        \App\Review::create([
            'client_name' => "yousef",
            'client_email' => "yousefher@gmail.com",
            'review_content' => "good",
            'rating' => 3,
            'likes' => 0,
            'product_id' => 6,
        ]);
    }
}
