<?php

namespace App\Models\RwyConfigs;

use App\Models\Airport;
use App\Models\Runway;
use Illuminate\Database\Eloquent\Model;

class RwyConfig extends Model
{
    /**
     * Allow all attributes to be mass assigned.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return bool True if this config is active
     */
    public function getActiveAttribute()
    {
        // What this function returns depends on your calculations results which determine if this config should be used :)
    }

    /**
     * Airport to which $this belongs
     */
    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }

    /**
     * Runways to use if this is an active config
     */
    public function runways()
    {
        // Bodge required because runways have 'designator' as primary key for the URLs to be nice, but ID is to be used for DB relationships
        return $this->belongsToMany(Runway::class, 'rwy_config_rwy', 'rwy_config_id', 'rwy_id', 'id', 'id');
    }

    /**
     * All the configurations that are required to be active before this one can be active itself !!!CAREFUL WITH INFINITE LOOPS HERE!!!
     */
    public function required_active()
    {
        // Bodge required because it'd be same column names
        return $this->belongsToMany(RwyConfig::class, 'rwy_config_rwy_config', 'rwy_config_id', 'rwy_config_id_active');
    }

    /**
     * Dates throughout which $this should be considered
     */
    public function valid_dates()
    {
        return $this->hasMany(RwyConfigDatetime::class);
    }

    /**
     * Daily times throughout which $this is valid
     */
    public function active_times()
    {
        return $this->hasMany(RwyConfigTime::class);
    }

}
