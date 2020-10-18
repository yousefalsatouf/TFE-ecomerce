<?php

use Illuminate\Database\Seeder;

class RecommendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Recommends::create([
            'user_id' => 8,
            'product_id' => 18,
        ]);
        \App\Recommends::create([
            'user_id' => 8,
            'product_id' => 12,
        ]);
        \App\Recommends::create([
            'user_id' => 8,
            'product_id' => 20,
        ]);
    }
}
