<?php

namespace App\Console\Commands;

use App\Models\Key;
use App\Models\Meteorology;
use App\Models\Weather;
use Illuminate\Console\Command;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Http;

class WeatherToHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:hour';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update weather information every hour';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $location = env('OPENWEATHER_LOCATION');
        $units = env('OPENWEATHER_UNITS');
        $apiKey = Key::where('user_id', '=', 1)
                ->get()
                ->last()
                ->value??0;
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units={$units}");
        if ($response->json()['cod'] === 200){
            Meteorology::create([
                'data' => json_encode($response->json())
            ]);
        }
    }
}
