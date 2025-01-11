<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrentCondition extends Model
{
    protected $fillable = [
        'weather_data_id', // Foreign key to WeatherData
        'datetime',
        'datetime_epoch',
        'temp',
        'feels_like',
        'humidity',
        'dew',
        'precip',
        'precip_prob',
        'snow',
        'snow_depth',
        'precip_type',
        'wind_gust',
        'wind_speed',
        'wind_dir',
        'pressure',
        'visibility',
        'cloud_cover',
        'solar_radiation',
        'solar_energy',
        'uv_index',
        'conditions',
        'icon',
        'source',
        'sunrise',
        'sunset',
        'moon_phase',
    ];
}
