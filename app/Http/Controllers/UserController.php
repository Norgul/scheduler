<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->paginate(14);
        return view('vendor.adminlte.layouts.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $equipment = Equipment::pluck('name', 'id');
        return view('vendor.adminlte.layouts.users.edit', compact('user', 'roles', 'equipment'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->role_id = $request->role_id;
        $user->save();

        $equipment_ids = $request->input('equipment');
        $user->equipment()->attach($equipment_ids);

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
