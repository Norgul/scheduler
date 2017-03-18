<?php

namespace App\Http\Controllers;

use App\EquipmentMethod;
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
        return view('vendor.adminlte.layouts.methods.create');
    }

    public function store(Request $request)
    {
        EquipmentMethod::create($request->all());
        return redirect('admin/method');
    }

    public function show($id)
    {
        //
    }

    public function edit(EquipmentMethod $method)
    {
        return view('vendor.adminlte.layouts.methods.edit', compact('method'));
    }

    public function update(Request $request, EquipmentMethod $method)
    {
        $method->update($request->all());
        return redirect('admin/method');
    }

    public function destroyMe($id)
    {
        EquipmentMethod::destroy($id);
        return redirect()->back();
    }
}
