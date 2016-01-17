<?php

use Illuminate\Database\Seeder;

class CharitySeeder extends Seeder
{
    public function run()
    {
        App\Charity::create(array(
            'name'        =>  'Child\'s Play',
            'description' =>  'Child\'s Play is a charitable organization that donates toys and games to children\'s hospitals worldwide. It was founded in 2003 by Mike Krahulik and Jerry Holkins, authors of the popular computer and video games-based webcomic Penny Arcade.',
            'url' => 'http://childsplaycharity.org/',            
            'votes'       =>  1000,
            'published' => 0,             
        ));
        
        App\Charity::create(array(
            'name'        =>  'MND Association',
            'description' =>  'The Motor Neurone Disease Association funds and promotes global research into MND and provides support to people in England, Wales and Northern Ireland.',
            'url' => 'http://www.mndassociation.org/',
            'votes'       =>  12,
            'published' => 1,            
        ));
        
        App\Charity::create(array(
            'name'        =>  'Cancer Research UK',
            'description' =>  'At Cancer Research UK we pioneer research to bring forward the day when all cancers are cured.',
            'url' => 'http://www.cancerresearchuk.org/',            
            'votes'       =>  273,
            'published' => 2,            
        )); 
    }
}