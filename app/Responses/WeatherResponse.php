<?php

namespace App\Responses;

use JsonSerializable;

class WeatherResponse implements JsonSerializable
{
    public $latitude;
    public $longitude;
    public $resolvedAddress;
    public $timezone;
    public $description;
    public $days;

    public function __construct(array $data)
    {
        $this->latitude = $data['latitude'];
        $this->longitude = $data['longitude'];
        $this->resolvedAddress = $data['resolvedAddress'];
        $this->timezone = $data['timezone'];
        $this->description = $data['description'];
        $this->days = array_map(fn($day) => new WeatherDayResponse($day), $data['days']);
    }

    public function jsonSerialize()
    {
        return [
            'status' => "success",
            'data' => get_object_vars($this),
        ];
    }
}

class WeatherDayResponse implements JsonSerializable
{
    public $datetime;
    public $tempmax;
    public $tempmin;
    public $temp;
    public $description;
    public $conditions;
    public $hours;

    public function __construct(array $data)
    {
        $this->datetime = $data['datetime'];
        $this->tempmax = $data['tempmax'];
        $this->tempmin = $data['tempmin'];
        $this->temp = $data['temp'];
        $this->description = $data['description'];
        $this->conditions = $data['conditions'];
        $this->hours = array_map(fn($hour) => new WeatherHourResponse($hour), $data['hours'] ?? []);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

class WeatherHourResponse implements JsonSerializable
{
    public $datetime;
    public $temp;
    public $feelslike;
    public $humidity;
    public $windgust;
    public $winddir;

    public function __construct(array $data)
    {
        $this->datetime = $data['datetime'];
        $this->temp = $data['temp'];
        $this->feelslike = $data['feelslike'];
        $this->humidity = $data['humidity'];
        $this->windgust = $data['windgust'];
        $this->winddir = $data['winddir'];
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
