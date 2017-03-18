<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentMethod;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Equipment $equipment, $time)
    {
        if (Auth::user()->isAdmin()) $users = User::pluck('name', 'id');
        elseif (Auth::user()->isStudent()) $users = User::where('id', Auth::user()->id)->pluck('name', 'id');
        else $users = Auth::user()->supervisor()->pluck('name', 'id');

        $methods = EquipmentMethod::all();
        return view('booking', compact('equipment', 'time', 'users', 'methods'));
    }
}
