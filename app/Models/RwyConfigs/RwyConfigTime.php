<?php

namespace App\Models\RwyConfigs;

use App\Models\Airport;
use Illuminate\Database\Eloquent\Model;

class RwyConfigTime extends Model
{
    /**
     * Allow all attributes to be mass assigned.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Airport to which it belongs
     */
    public function airport()
    {
        return $this->belongsTo(RwyConfig::class);
    }
}
