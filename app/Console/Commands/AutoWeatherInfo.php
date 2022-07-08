<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Mail;
use App\Mail\WeatherInfo;
use App\Models\Meteorology;

class AutoWeatherInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:weatherinfo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto sent weather info to email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::whereHas('frequency', function (Builder $query) {
            $query->where('status', '=', 1);
        })->whereHas('frequency', function (Builder $query) {
            $query->where('frequency', '=', Carbon::now()->format('Y-m-d'));
        })->get();

        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new WeatherInfo($user));
            }
        }
        return 0;
    }
}
