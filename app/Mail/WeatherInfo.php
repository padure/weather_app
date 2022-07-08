<?php

namespace App\Mail;

use App\Models\Meteorology;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeatherInfo extends Mailable
{
    use Queueable, SerializesModels;
    public $meteorology;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($meteorology)
    {
        $this->meteorology = $meteorology;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $weather = Meteorology::get()->last();
        $weather = json_decode($weather->data);

        if ($weather->cod !== 200){
            $weather = null;
        }

        return $this->subject('OpenWeather info')
                    ->view('emails.weather', [
                        'weather'=>$weather
                    ]);
    }
}
