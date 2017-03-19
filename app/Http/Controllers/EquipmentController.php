<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentMethod;
use App\MethodColumn;
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
        $methods = EquipmentMethod::pluck('name', 'id');
        $columns = MethodColumn::all();
        return view('vendor.adminlte.layouts.equipment.create', compact('methods', 'columns'));
    }

    public function store(Request $request)
    {
        Equipment::create($request->all())->equipment_methods()->attach($request->input('methods'));
        return redirect('admin/equipment');
    }

    public function edit(Equipment $equipment)
    {
        $methods = EquipmentMethod::pluck('name', 'id');
        $columns = MethodColumn::all();
        return view('vendor.adminlte.layouts.equipment.edit', compact('equipment', 'methods', 'columns'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $equipment->update($request->all());
        $equipment->method_column_id = $request->input('method_column_id');
        $equipment->save();
        $equipment->equipment_methods()->sync($request->has('methods') ? $request->input('methods') : []);
        return redirect('admin/equipment');
    }

    public function destroyMe($id)
    {
        Equipment::destroy($id);
        return redirect()->back();
    }
}
