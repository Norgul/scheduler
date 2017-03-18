<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentMethod;
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
        return view('vendor.adminlte.layouts.equipment.create');
    }

    public function store(Request $request)
    {
        Equipment::create($request->all());
        return redirect('admin/equipment');
    }

    public function show($id)
    {
        //
    }

    public function edit(Equipment $equipment)
    {
        $methods = EquipmentMethod::pluck('name', 'id');
        return view('vendor.adminlte.layouts.equipment.edit', compact('equipment', 'methods'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $equipment->update($request->all());
        $equipment->equipment_methods()->sync($request->has('methods') ? $request->input('methods') : []);
        return redirect('admin/equipment');
    }

    public function destroyMe($id)
    {
        Equipment::destroy($id);
        return redirect()->back();
    }
}
