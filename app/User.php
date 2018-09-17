<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function organisation()
    {
        return $this->morphTo();
    }

    public function organisationWithApplications()
    {
        if ($this->attributes['organisation_type'] == Airline::class) {
            return $this->morphTo('organisation')->withAirlineApplications();
        }

        return $this->morphTo('organisation')->withVendorApplications();
    }
}
