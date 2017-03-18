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
}