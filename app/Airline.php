<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    public static function scopeWithAirlineApplications(Builder $query)
    {
        return $query->with('applications');
    }

    public function applications()
    {
        return $this->hasMany(AirlineApplication::class);
    }
}
