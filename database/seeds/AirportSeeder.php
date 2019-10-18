<?php

use League\Csv\Reader;
use App\Models\Airport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AirportSeeder extends Seeder
{

    protected $csv;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->csv = Reader::createFromPath(base_path().'/database/seeds/csvs/airports.csv')->setHeaderOffset(0);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->csv as $airport) {
            if (
            $airport['ident'] != '' &&
            strlen($airport['ident']) <= 4 &&
            $airport['name'] != ''
            ) {
                Airport::create([
                    'icao' => $airport['ident'],
                    'name' => $airport['name'],
                ]);
            }
        }

        echo Airport::count() . ' airports added'.PHP_EOL;
    }
}
