<?php

use Illuminate\Database\Seeder;

class CharitySeeder extends Seeder
{
    public function run()
    {
        App\Charity::create(array(
            'name'        => 'World Cancer Research Fund International',
            'description' => 'The national charity for single homeless people',
            'url'         => 'http://www.crisis.org.uk/',            
            'votes'       =>  61,
            'published'   =>  2,            
        ));
        
        App\Charity::create(array(
            'name'        => 'Chairty Water',
            'description' => 'The national charity for single homeless people',
            'url'         => 'http://www.crisis.org.uk/',            
            'votes'       =>  50,
            'published'   =>  2,            
        ));
        
        App\Charity::create(array(
            'name'        => 'Crisis',
            'description' => 'The national charity for single homeless people',
            'url'         => 'http://www.crisis.org.uk/',            
            'votes'       =>  38,
            'published'   =>  2,            
        ));
        
        App\Charity::create(array(
            'name'        => 'Crisis',
            'description' => 'The national charity for single homeless people',
            'url'         => 'http://www.crisis.org.uk/',            
            'votes'       =>  38,
            'published'   =>  2,            
        ));
    }
}