<?php

use Illuminate\Database\Seeder;

class SponsorsSeeder extends Seeder
{
    public function run()
    {
        App\Sponsor::create(array(
            'name'   =>  '...',
            'image'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',
            'url'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',            
        ));
        
        App\Sponsor::create(array(
            'name'   =>  '...',
            'image'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',
            'url'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',              
        ));
        
        App\Sponsor::create(array(
            'name'   =>  '...',
            'image'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',
            'url'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',              
        ));
        
        App\Sponsor::create(array(
            'name'   =>  '...',
            'image'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',
            'url'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',              
        ));
        
    }
}