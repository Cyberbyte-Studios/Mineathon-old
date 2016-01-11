<?php

use Illuminate\Database\Seeder;

class CharitySeeder extends Seeder
{
    public function run()
    {
        App\Charity::create(array(
            'name'        =>  'Child\'s Play',
            'description' =>  'Child\'s Play is a charitable organization that donates toys and games to children\'s hospitals worldwide. It was founded in 2003 by Mike Krahulik and Jerry Holkins, authors of the popular computer and video games-based webcomic Penny Arcade.',
            'votes'       =>  1000,
            'image'       =>  'grbgrtekbrjbvdfjve',
        ));
        
        App\Charity::create(array(
            'name'        =>  'Cancer Research UK',
            'description' =>  'At Cancer Research UK we pioneer research to bring forward the day when all cancers are cured.',
            'votes'       =>  273,
            'image'       =>  'grbgrtekfergrgkrkrg',
        )); 
        
        App\Charity::create(array(
            'name'        =>  'MND Association',
            'description' =>  'The Motor Neurone Disease Association funds and promotes global research into MND and provides support to people in England, Wales and Northern Ireland.',
            'votes'       =>  12,
            'image'       =>  'abcdefghijklmnopqrs',
        ));
        
        App\Charity::create(array(
            'name'        =>  'AbleGamers',
            'description' =>  'AbleGamers is a 501(c)3 non-profit that strives to improve the quality of life for people with disabilities through the power of video games. The charity was founded by Mark Barlet and Stephanie Walker in 2005. Today, AbleGamers grants accessible peripherals to people with disabilities worldwide and works with developers to make video games more accessible.',
            'votes'       =>  1021,
            'image'       =>  '1235fefefefefefefeg',
        ));
        
        App\Charity::create(array(
            'name'        =>  'SpecialEffect',
            'description' =>  'SpecialEffect is a UK based charity which uses video games and technology to enhance the quality of life of people with disabilities.',
            'votes'       =>  4,
            'image'       =>  'ehfehfgefhjgefjhevejh',
        ));          
    }
}