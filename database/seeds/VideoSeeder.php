<?php

use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        App\Video::create(array(
            'user'     =>  'Matt Gray',
            'charity_id' => 1,
            'youtube'  =>  'R6MVaWr-XTk',
            'published' => 0,            
        ));
        
        App\Video::create(array(
            'user'     =>  'Schizo Manicman',
            'charity_id' => 2,
            'youtube'  =>  '-PjKeN12Pls',
            'published' => 1,            
        ));

        App\Video::create(array(
            'user'     =>  'Cancer Research UK',
            'charity_id' => 3,
            'youtube'  =>  'LmdhnaG5P7k',
            'published' => 2,            
        ));
    }
}