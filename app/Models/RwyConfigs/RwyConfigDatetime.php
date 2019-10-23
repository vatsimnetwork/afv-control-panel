<?php

namespace App\Models\RwyConfigs;

use Illuminate\Database\Eloquent\Model;

class RwyConfigDatetime extends Model
{
    /**
     * Allow all attributes to be mass assigned.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime',
    ];
}
