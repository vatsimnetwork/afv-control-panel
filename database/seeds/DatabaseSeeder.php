<?php

use Illuminate\Database\Seeder;
//use Database\Seeds\AirportSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AirportSeeder::class);
        // $this->call(RunwaySeeder::class);
    }
}