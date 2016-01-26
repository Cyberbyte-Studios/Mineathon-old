<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        App\User::create(array(
            'name'     =>  'Cammygames',
            'email'    =>  'cammygamesyt@gmail.com',
            'password' =>  '$2y$10$3imw3S5lCWi0WCWL3aftyOnp9LGNNm6XTQZ5I9dWpRPAS2yv1iETu',
            'level'    =>  3,
        ));
        
        App\User::create(array(
            'name'     =>  'SCollins',
            'email'    =>  'theatrepro11@gmail.com',
            'password' =>  '$2y$10$uJu4Faoulrwc8RogJGcUPO/HaepUWO5q06lmm.2qasST9Lz/IBpve',
            'level'    =>  3,
        ));
        
        App\User::create(array(
            'name'     =>  'Hannah',
            'email'    =>  'contact@mineathon.com',
            'password' =>  '$2y$10$lAyxLf2PN9Sn8S2Fmg8CI.HhAkkZsGF2bc1JtAZx4M5rcNhOhZBcW',
            'level'    =>  3,
        ));
    }
}