<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        App\Setting::create(array(
            'key'    =>  'sponsors',
            'value'  =>  '1',
        ));
        
        App\Setting::create(array(
            'key'    =>  'guests',
            'value'  =>  '1',
        ));
    }
}