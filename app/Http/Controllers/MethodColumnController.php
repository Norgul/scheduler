<?php

namespace App\Http\Controllers;

use App\EquipmentMethod;
use App\MethodColumn;
use Illuminate\Http\Request;

class MethodColumnController extends Controller
{
    public function index()
    {
        $columns = MethodColumn::all();
        return view('vendor.adminlte.layouts.columns.index', compact('columns'));
    }

    public function create()
    {
        $methods = EquipmentMethod::pluck('name', 'id');
        return view('vendor.adminlte.layouts.columns.create', compact('methods'));
    }

    public function store(Request $request)
    {
        $column = MethodColumn::create($request->all());
        $column->methods()->attach($request->input('methods'));
        return redirect('admin/column');
    }

    public function show($id)
    {
        //
    }

    public function edit(MethodColumn $column)
    {
        $methods = EquipmentMethod::pluck('name', 'id');
        return view('vendor.adminlte.layouts.columns.edit', compact('column', 'methods'));
    }

    public function update(Request $request, MethodColumn $column)
    {
        $column->update($request->all());
        $column->methods()->sync($request->has('methods') ? $request->input('methods') : []);

        return redirect('admin/column');
    }

    public function destroyMe($id)
    {
        MethodColumn::destroy($id);
        return redirect()->back();
    }
}
