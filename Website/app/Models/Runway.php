<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Runway extends Model
{
    /**
     * Sets the airport ICAO as its primary key. ID will be used for relationships.
     * 
     * @var string
     */
    protected $primaryKey = 'designator';

    /**
     * Primary key is now a string so it doesn't increment automatically.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * Allow all attributes to be mass assigned.
     * ID should NOT be touched by the application in any moment.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }

    public function activeConditions()
    {
        return $this->hasMany(RunwayActiveCondition::class, 'runway_id', 'id');
    }
}
