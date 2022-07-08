<?php

namespace App\Http\Controllers;

use App\Models\Key;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    /**
     *  Get key from DB
     */
    public function index()
    {
        $key = Key::where('user_id', '=', 1)
            ->get()
            ->last();
        return view('admin.key.index', [
            'key'=>$key
        ]);
    }
    /**
     *  Store key in DB
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'weather_key' => 'required'
        ]);
        Key::create([
            'value' => $request->weather_key,
            'user_id' => auth()->id()
        ]);
        return redirect()->back()->with('completed', 'Key for Open Weather is stored!');
    }
}
