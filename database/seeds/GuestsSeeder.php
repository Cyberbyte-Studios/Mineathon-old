<?php

use Illuminate\Database\Seeder;

class GuestsSeeder extends Seeder
{
    public function run()
    {
        App\Guest::create(array(
            'name'   =>  '...',
            'image'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',
            'url'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',             
        ));
        
        App\Guest::create(array(
            'name'   =>  '...',
            'image'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',
            'url'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',             
        ));
        
        App\Guest::create(array(
            'name'   =>  '...',
            'image'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',
            'url'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',             
        ));
        
        App\Guest::create(array(
            'name'   =>  '...',
            'image'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',
            'url'  =>  'https://placeholdit.imgix.net/~text?txtsize=33&txt=Soon&w=200&h=200',             
        ));
        
    }
}