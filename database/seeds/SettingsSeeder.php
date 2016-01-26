<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        App\Setting::create(array(
            'key'    =>  'sponsors',
            'value'  =>  '0',
        ));
        
        App\Setting::create(array(
            'key'    =>  'guests',
            'value'  =>  '0',
        ));
        
        App\Setting::create(array(
            'key'    =>  'donate',
            'value'  =>  '0',
        ));
        
        App\Setting::create(array(
            'key'    =>  'votes',
            'value'  =>  '0',
        ));         
    }
}