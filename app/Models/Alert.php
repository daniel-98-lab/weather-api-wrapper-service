<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'weather_data_id',
        'query_cost',
        'event',
        'description'
    ];
}
