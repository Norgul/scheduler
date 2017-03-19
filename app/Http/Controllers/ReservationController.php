<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentMethod;
use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(Equipment $equipment, $time)
    {
        //return EquipmentMethod::find(3)->columns->where('pivot.method_column_id', 1)->first()->id;
        $users = $this->supervised_user_list();
        return view('reservation.index', compact('equipment', 'time', 'users'));
    }

    public function edit(Reservation $reservation)
    {
        $users = $this->supervised_user_list();
        $methods = $reservation->equipment->equipment_methods;
        return view('reservation.edit', compact('reservation', 'users', 'methods'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        $reservation->user_list()->sync($request->has('users') ? $request->input('users') : []);
        return redirect('/');
    }

    public function run(Reservation $reservation)
    {
        $reservation->update(['completed' => true]);
        return redirect()->back();
    }

    public function terminate(Reservation $reservation)
    {
        return view('reservation.terminate', compact('reservation'));
    }

    /*public function update_termination(Reservation $reservation)
    {
        $reservation->update()
        return view('reservation.terminate', compact('reservation'));
    }*/

    public function reserve(Request $request, Equipment $equipment, $time)
    {
        $reservation = Reservation::create(array(
            'user_id' => Auth::user()->id,
            'equipment_id' => $equipment->id,
            'reserved_from' => Carbon::createFromTimestamp($time),
            'reserved_to' => Carbon::createFromTimestamp($time),
            'number_of_samples' => $request->input('number_of_samples'),
            'method_id' => $request->input('method_id')
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

    public function supervised_user_list()
    {
        if (Auth::user()->isAdmin()) $users = User::pluck('name', 'id');
        elseif (Auth::user()->isStudent()) $users = User::where('id', Auth::user()->id)->pluck('name', 'id');
        else $users = Auth::user()->supervisor()->pluck('name', 'id');

        return $users;
    }
}
