<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentMethod;
use App\Http\Requests;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

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
        $user = Auth::user() ? Auth::user()->load('equipment') : null;

        return view('landing', compact('equipment', 'scheduler_start_time', 'scheduler_end_time', 'time', 'user'));
    }

    public function reserve(Request $request, Equipment $equipment, $time)
    {
        $reservation = Reservation::create(array(
            'user_id' => Auth::user()->id,
            'equipment_id' => $equipment->id,
            'reserved_from' => Carbon::createFromTimestamp($time),
            'reserved_to' => Carbon::createFromTimestamp($time),
            'samples' => $request->samples,
            'method_id' => $request->group
        ));

        $reservation->user_list()->attach($request->users);

        return redirect(session('fallback_url'));
    }

    public function reserveTo(Equipment $equipment, $time, $timeTo)
    {
        $split_time = explode(':', $timeTo);
        Reservation::create([
            'user_id' => Auth::user()->id,
            'equipment_id' => $equipment->id,
            'reserved_from' => Carbon::createFromTimestamp($time),
            'reserved_to' => Carbon::createFromTimestamp($time)->startOfDay()->addHours($split_time[0])->addMinutes($split_time[1]),
        ]);
        return redirect()->back();
    }

    public function booking(Equipment $equipment, $time)
    {
        $users = User::pluck('name');
        $methods = EquipmentMethod::all();

        return view('booking', compact('equipment', 'time', 'users', 'methods'));
    }

}