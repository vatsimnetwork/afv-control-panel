<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'first_name', 'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_login' => 'datetime',
    ];


    /**
     * Gets the airports the user has permission to edit
     */
    public function airports()
    {
        return $this->belongsToMany(Airport::class);

        // To-Do: Look at a way of making this bodge work nicely everywhere
        /*if ($this->admin) {
            return Airport::whereNotNull('icao');
        } else {
            return $this->belongsToMany(Airport::class);
        /*}*/
    }
}
