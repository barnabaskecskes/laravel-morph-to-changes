<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public static function scopeWithVendorApplications(Builder $query)
    {
        return $query->with('applications');
    }

    public function applications()
    {
        return $this->hasMany(VendorApplication::class);
    }
}
