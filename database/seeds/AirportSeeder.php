<?php

use App\Models\Airport;
use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\Schema;

class AirportSeeder extends CsvSeeder
{
    /**
     * Constructor
     */
    public function __construct()
    {
		$this->table = 'airports';
        $this->filename = base_path().'/database/seeds/csvs/airports.csv';
        $this->mapping = [
            12 => 'icao',
            3 => 'name',
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Airport::truncate(); // Wipes the current contents
        Schema::enableForeignKeyConstraints();

        parent::run(); // Seed table

        // Set updated_at/created_at datetimes
        Airport::where('created_at', null)
               ->orWhere('updated_at', null)
               ->update([
                   'created_at' => now(),
                   'updated_at' => now(),
               ]);

        echo Airport::count() . ' airports added'.PHP_EOL;
    }
}
