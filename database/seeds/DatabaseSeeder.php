<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        
        $this->call(CharitySeeder::class);
        
        $this->call(VideoSeeder::class);
        
        $this->call(SponsorsSeeder::class);
        
        $this->call(GuestsSeeder::class);
        
        $this->call(SettingsSeeder::class);
    }
}
