<?php

use Illuminate\Database\Seeder;

class CharitySeeder extends Seeder
{
    public function run()
    {
        App\Charity::create(array(
            'name'        => 'Crisis',
            'description' => 'The national charity for single homeless people',
            'url'         => 'http://www.crisis.org.uk/',            
            'votes'       =>  0,
            'published'   =>  2,            
        ));         
    }
}