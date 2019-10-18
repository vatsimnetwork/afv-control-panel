<?php

use League\Csv\Reader;
use App\Models\Runway;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class RunwaySeeder extends Seeder
{

    protected $csv;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->csv = Reader::createFromPath(base_path().'/database/seeds/csvs/runways.csv')->setHeaderOffset(0);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->csv as $runway) {
            $belongsTo = $runway['airport_ident'];

            if (strlen($belongsTo) > 4) {
                continue;
            }

            try{
                if (
                $runway['le_ident'] != '' &&
                $runway['le_heading_degT'] != ''
                ) {
                    Runway::create([
                        'airport_icao' => $belongsTo,
                        'designator' => $runway['le_ident'],
                        'heading' => $runway['le_heading_degT'],
                    ]);
                }

                if (
                $runway['he_ident'] != '' &&
                $runway['he_heading_degT'] != ''
                ) {
                    Runway::create([
                        'airport_icao' => $belongsTo,
                        'designator' => $runway['he_ident'],
                        'heading' => $runway['he_heading_degT'],
                    ]);
                }
            } catch (QueryException $e) { // If there's any issues, we don't want the runway
                Runway::where('airport_icao', $belongsTo)->delete();
            }
        }

        echo Runway::count() . ' runways added'.PHP_EOL;
    }
}
