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
        
       // $this->call(CountrySeed::class);
        //$this->call(RoleSeed::class);
        //$this->call(UserSeed::class);
        //$this->call(tours::class);
       // $this->call(foodesSeeder::class); 
        $this->call(drinksSeeder::class);
    }
}
