<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::all();
        return view('vendor.adminlte.layouts.equipment.index', compact('equipment'));
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

    public function edit(Equipment $equipment)
    {
        return view('vendor.adminlte.layouts.equipment.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $equipment->update($request->all());
        return redirect('admin/equipment');
    }

    public function destroyMe($id)
    {
        Equipment::destroy($id);
        return redirect()->back();
    }
}
