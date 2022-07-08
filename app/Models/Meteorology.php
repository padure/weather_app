<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meteorology extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
    ];

    public function getDataInWeather(){
        if ($this->cod != 401){
            return [];
        }
        if (is_null($this)){
            return [];
        }
        return json_decode($this->data);
    }
}
