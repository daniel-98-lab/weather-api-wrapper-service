<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    protected $fillable = [
        'query_cost',
        'latitude',
        'longitude',
        'resolved_address',
        'address',
        'timezone',
        'tz_offset',
        'description',
    ];

    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    public function stations()
    {
        return $this->hasMany(Station::class);
    }

    public function currentConditions()
    {
        return $this->hasOne(CurrentCondition::class);
    }
}
