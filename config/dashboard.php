<?php
// This gets the weather in the users location, based on their lat and long
return [
    // ...
    'tiles' => [
        'time_weather' => [
            'open_weather_map_key' => env('OPEN_WEATHER_MAP_KEY'),
            'open_weather_map_city' => 'Antwerp',
            'units' => 'metric', // 'metric' or 'imperial' (metric is default)
            'buienradar_latitude' => env('BUIENRADAR_LATITUDE'),
            'buienradar_longitude' => env('BUIENRADAR_LONGITUDE'),
        ],
    ],
];

?>