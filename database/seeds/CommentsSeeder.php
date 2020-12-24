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
            'replay' => "he is right babe",
            'review_id' => 9,
        ]);
        \App\Comments::create([
            'name' => "stranger 2",
            'replay' => "he is right babe 2",
            'review_id' => 9,
        ]);
    }
}
