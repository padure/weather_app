<?php

namespace App\Http\Controllers;

use App\Models\Frequency;
use Carbon\Carbon;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrequencyController extends Controller
{
    /**
     *  Store new seting in DB
     */
    public function index()
    {
        $frequency = Frequency::where('user_id', '=', Auth::id())
                            ->get()->last();

        return view('user.frequency.index', [
            'frequency'=>$frequency
        ]);
    }
    /**
     *  Store new seting in DB
     */
    public function store(Request $request)
    {
        $request->status == 'on'?$status =1:$status =0;
        $existThisUser = Frequency::where('user_id', '=', Auth::id());
        if ($existThisUser->exists()){
            Frequency::where('user_id', Auth::id())
                ->update(['frequency' => Carbon::parse($request->frequency)->format('Y-m-d'),
                    'status' => $status,
                    'user_id' => auth()->id()
                ]);
        }else{
            $storeData = $request->validate([
                'frequency' => 'required'
            ]);
            Frequency::create([
                'frequency' => Carbon::parse($request->frequency)->format('Y-m-d'),
                'status' => $status,
                'user_id' => auth()->id()
            ]);
        }

        return redirect()->back()->with('completed', 'Frequency for send information about Open Weather is stored!');
    }
}
