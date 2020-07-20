<?php

use App\Ads;
use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ads::create([
            'title' => 'Amazon Market',
            'description' => 'Here is your perfect app market to shop online',
            'link' => 'http://amazon.com',
            'image' => 'amazon.jpg'
        ]);
    }
}
