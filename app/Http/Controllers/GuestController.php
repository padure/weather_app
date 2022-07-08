<?php

namespace App\Http\Controllers;

use App\Models\Meteorology;

class GuestController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $weather = Meteorology::get()->last();
        if (is_null($weather)){
            return view('index', ['weather'=> $weather]);
        }
        $weather = json_decode($weather->data);

        if ($weather->cod !== 200){
            $weather = null;
        }
        return view('index', ['weather'=> $weather]);
    }
}
