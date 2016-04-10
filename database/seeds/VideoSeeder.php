<?php

use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        App\Video::create(array(
            'user'     =>  'webmaster@cyberbyte.org.uk',
            'charity_id' => 1,
            'youtube'  =>  'NySTLv1D60U',
            'published' => 2,            
        ));
        
        App\Video::create(array(
            'user'     =>  'webmaster@cyberbyte.org.uk',
            'charity_id' => 1,
            'youtube'  =>  'NySTLv1D60U',
            'published' => 2,            
        ));
        
        App\Video::create(array(
            'user'     =>  'webmaster@cyberbyte.org.uk',
            'charity_id' => 2,
            'youtube'  =>  'NySTLv1D60U',
            'published' => 2,            
        ));
        
        App\Video::create(array(
            'user'     =>  'webmaster@cyberbyte.org.uk',
            'charity_id' => 3,
            'youtube'  =>  'NySTLv1D60U',
            'published' => 2,            
        ));
        
        App\Video::create(array(
            'user'     =>  'webmaster@cyberbyte.org.uk',
            'charity_id' => 4,
            'youtube'  =>  'NySTLv1D60U',
            'published' => 1,            
        ));
    }
}