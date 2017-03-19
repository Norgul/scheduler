<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentMethod;
use App\MethodColumn;
use Illuminate\Http\Request;

class EquipmentMethodController extends Controller
{
    public function index()
    {
        $methods = EquipmentMethod::all();
        return view('vendor.adminlte.layouts.methods.index', compact('methods'));
    }

    public function create()
    {
        $equipment = Equipment::pluck('name', 'id');
        $columns = MethodColumn::pluck('name', 'id');
        return view('vendor.adminlte.layouts.methods.create', compact('equipment', 'columns'));
    }

    public function store(Request $request)
    {
        $method = EquipmentMethod::create($request->all());
        $method->columns()->attach($request->input('columns'));
        $method->equipment()->attach($request->input('equipment'));
        return redirect('admin/method');
    }

    public function edit(EquipmentMethod $method)
    {
        $equipment = Equipment::pluck('name', 'id');
        $columns = MethodColumn::pluck('name', 'id');
        return view('vendor.adminlte.layouts.methods.edit', compact('method', 'equipment', 'columns'));
    }

    public function update(Request $request, EquipmentMethod $method)
    {
        $method->update($request->all());
        $method->columns()->sync($request->has('columns') ? $request->input('columns') : []);
        $method->equipment()->sync($request->has('equipment') ? $request->input('equipment') : []);

        return redirect('admin/method');
    }

    public function destroyMe($id)
    {
        EquipmentMethod::destroy($id);
        return redirect()->back();
    }
}
