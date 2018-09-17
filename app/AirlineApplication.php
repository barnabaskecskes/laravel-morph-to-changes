<?php

namespace App;

use App\Enums\ApplicationType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AirlineApplication extends Model
{
    public function scopeInHouseApplications(Builder $query)
    {
        return $query->whereType(ApplicationType::IN_HOUSE);
    }
}
