<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Equipment;
use App\Http\Requests;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public function index($timestamp)
    {
        $time = Carbon::createFromTimestamp($timestamp);

        $scheduler_start_time = Carbon::createFromTimestamp($timestamp)->addHours(6);
        $scheduler_end_time = Carbon::createFromTimestamp($timestamp)->addHours(20);

        $equipment = Equipment::with('reservations', 'reservations.user')->get();
        $reservations = Reservation::all();
        return view('landing', compact('equipment', 'scheduler_start_time', 'scheduler_end_time', 'time', 'reservations'));
    }

    public function reserve(Equipment $equipment, $time)
    {
        Reservation::create([
            'user_id' => 1, //Auth::user()->id,
            'equipment_id' => $equipment->id,
            'reserved_from' => Carbon::createFromTimestamp($time),
            'reserved_to' => Carbon::createFromTimestamp($time),
        ]);

        return redirect()->back();
    }

    public function reserveTo(Equipment $equipment, $time, $timeTo)
    {
        Reservation::create([
            'user_id' => 1, //Auth::user()->id,
            'equipment_id' => $equipment->id,
            'reserved_from' => Carbon::createFromTimestamp($time),
            'reserved_to' => Carbon::createFromTimestamp($timeTo),
        ]);

        return redirect()->back();
    }

}