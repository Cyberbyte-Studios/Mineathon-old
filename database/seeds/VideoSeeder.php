<?php

use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        App\Video::create(array(
            'user'     =>  'Tom Scott',
            'charity_id' => 1,
            'youtube'  =>  't60EfnqZKrQ',
            'published' => 0,
        ));
        
        App\Video::create(array(
            'user'    =>  'Scott Tom',
            'charity_id' => 1,
            'youtube'  =>  'pj9-vL5JFqo',
            'published' => 1,            
        ));
        
        App\Video::create(array(
            'user'     =>  'Matt Gray',
            'charity_id' => 1,
            'youtube'  =>  'R6MVaWr-XTk',
            'published' => 2,            
        ));
        
        App\Video::create(array(
            'user'     =>  'Gray Matt',
            'charity_id' => 1,
            'youtube'  =>  'RT4EhX8F4nw',
            'published' => 2,            
        ));

        App\Video::create(array(
            'user'     =>  'Colin Furze',
            'charity_id' => 2,
            'youtube'  =>  'JZM1fQitsx8',
            'published' => 2,            
        ));
        
        App\Video::create(array(
            'user'     =>  'Peladophobian',
            'charity_id' => 1,
            'youtube'  =>  'BbBVfiDOk7M',
            'published' => 2,            
        ));
        
        App\Video::create(array(
            'user'     =>  'Casey Neistat',
            'charity_id' => 2,
            'youtube'  =>  'FvhOwpip0K8',
            'published' => 2,            
        ));
        
        App\Video::create(array(
            'user'     =>  'I Like Trains',
            'charity_id' => 1,
            'youtube'  =>  'OaZvvYaYw_Q',
            'published' => 2,            
        ));           
        
        App\Video::create(array(
            'user'     =>  'Neistat Casey',
            'charity_id' => 4,
            'youtube'  =>  '4uC3S9m1hJs',
            'published' => 2,            
        ));
        
        App\Video::create(array(
            'user'     =>  'Trains Like Me',
            'charity_id' => 5,
            'youtube'  =>  'QYlVJlmjLEc',
            'published' => 2,            
        ));          
    }
}