<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->paginate(14);
        return view('vendor.adminlte.layouts.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $equipment = Equipment::pluck('name', 'id');
        $supervisor = User::pluck('name', 'id');

        return view('vendor.adminlte.layouts.users.create', compact('roles', 'equipment', 'supervisor'));
    }

    public function store(Request $request)
    {
        return $request->all();
        $user = User::create([$request->all()]);
        $user->attach($request->input('equipment'));
        $user->attach($request->input('supervisor'));
        return redirect('admin/user');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $equipment = Equipment::pluck('name', 'id');
        $supervisor = User::where('id', '<>', $user->id)->pluck('name', 'id');

        return view('vendor.adminlte.layouts.users.edit', compact('user', 'roles', 'equipment', 'supervisor'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->role_id = $request->role_id;
        $user->save();

        $user->equipment()->sync($request->has('equipment') ? $request->input('equipment') : []);
        $user->supervisor()->sync($request->has('supervisor') ? $request->input('supervisor') : []);

        return redirect('admin/user');
    }

    public function destroyMe($id)
    {
        User::destroy($id);
        return redirect()->back();
    }

    public function changeState($id)
    {
        User::findOrFail($id)->update(['active' => !(User::findOrFail($id)->active)]);
        return redirect()->back();
    }
}
