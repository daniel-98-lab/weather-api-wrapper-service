<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = [
        'weather_data_id', // Foreign key to WeatherData
        'id',
        'name',
        'distance',
        'latitude',
        'longitude',
        'use_count',
        'quality',
        'contribution',
    ];
}
