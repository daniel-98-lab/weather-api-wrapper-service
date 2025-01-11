<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'weather_data_id', // Foreign key to WeatherData
        'datetime',
        'datetime_epoch',
        'temp_max',
        'temp_min',
        'temp',
        'feels_like_max',
        'feels_like_min',
        'feels_like',
        'dew',
        'humidity',
        'precip',
        'precip_prob',
        'precip_cover',
        'precip_type',
        'snow',
        'snow_depth',
        'wind_gust',
        'wind_speed',
        'wind_dir',
        'pressure',
        'cloud_cover',
        'visibility',
        'solar_radiation',
        'solar_energy',
        'uv_index',
        'severe_risk',
        'sunrise',
        'sunset',
        'moon_phase',
        'conditions',
        'description',
        'icon',
        'source',
    ];

    public function hours()
    {
        return $this->hasMany(Hour::class);
    }
}
