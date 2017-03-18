<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentMethod;
use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Equipment $equipment, $time)
    {
        if (Auth::user()->isAdmin()) $users = User::pluck('name', 'id');
        elseif (Auth::user()->isStudent()) $users = User::where('id', Auth::user()->id)->pluck('name', 'id');
        else $users = Auth::user()->supervisor()->pluck('name', 'id');
        return view('booking.index', compact('equipment', 'time', 'users'));
    }

    public function edit(Reservation $reservation)
    {
        //$reservation = $reservation->with('user_list', '')
        return view('booking.edit', compact('reservation'));
    }

    public function update(Reservation $reservation){
        return $reservation;
    }

    public function run(Reservation $reservation)
    {
        $reservation->update(['completed' => true]);
        return redirect()->back();
    }

    public function reserve(Request $request, Equipment $equipment, $time)
    {
        $reservation = Reservation::create(array(
            'user_id' => Auth::user()->id,
            'equipment_id' => $equipment->id,
            'reserved_from' => Carbon::createFromTimestamp($time),
            'reserved_to' => Carbon::createFromTimestamp($time),
            'number_of_samples' => $request->input('samples'),
            'method_id' => $request->input('group')
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
}
