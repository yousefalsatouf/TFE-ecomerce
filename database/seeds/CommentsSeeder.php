<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Comments::create([
            'name' => "stranger",
            'reply' => "he is right babe",
            'review_id' => 9,
        ]);
        \App\Comments::create([
            'name' => "stranger 2",
            'reply' => "he is right babe 2",
            'review_id' => 9,
        ]);
    }
}
