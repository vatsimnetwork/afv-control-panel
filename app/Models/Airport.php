<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    /**
     * Sets the airport ICAO as its primary key. ID will be used for relationships
     * 
     * @var string
     */
    protected $primaryKey = 'icao';

    /**
     * Primary key is now a string so it doesn't increment automatically.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * Allow all attributes to be mass assigned.
     *
     * @var array
     */
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function runways()
    {
        return $this->hasMany(Runway::class);
    }

    public function rwy_configs()
    {
        return $this->hasMany(RwyConfigs\RwyConfig::class);
    }
}
