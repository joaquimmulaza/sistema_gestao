<?php

namespace App\Http\Controllers;

use App\Models\Vistoria;
use Illuminate\Http\Request;

class VistoriaController extends Controller
{
    public function index()
    {
        return Vistoria::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'observacoes' => 'nullable|string',
        ]);

        return Vistoria::create($request->all());
    }

    public function show($id)
    {
        return Vistoria::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $vistoria = Vistoria::findOrFail($id);
        $vistoria->update($request->all());

        return $vistoria;
    }

    public function destroy($id)
    {
        return Vistoria::destroy($id);
    }
}
