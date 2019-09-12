<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
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
}
