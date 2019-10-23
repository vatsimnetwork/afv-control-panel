<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Runway extends Model
{
    /**
     * Airport ICAO + RWY Designator = Unique runway. ID will be used for relationships.
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
     * Prevent attributes from being mass assigned.
     * ID should NOT be touched by the application in any moment.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }   
}
