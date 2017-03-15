<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->paginate(14);
        return view('vendor.adminlte.user.index', compact('users'));
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
        return view('vendor.adminlte.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('panel/user');
    }

    public function destroyMe($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
}
