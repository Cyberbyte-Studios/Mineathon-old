<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        App\User::create(array(
            'name'     =>  'Cammygames',
            'email'    =>  'test@test.com',
            'password' =>  bcrypt('test'),
            'level'    =>  3,
        ));
        
        App\User::create(array(
            'name'     =>  'SCollins',
            'email'    =>  'theatrepro11@gmail.com',
            'password' =>  bcrypt('test'),
            'level'    =>  3,
        ));
        
        App\User::create(array(
            'name'     =>  'Scrub',
            'email'    =>  1,
            'password' =>  bcrypt('test'),
            'level'    =>  1,
        ));
    }
}