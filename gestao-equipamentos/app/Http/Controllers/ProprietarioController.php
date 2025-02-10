<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
use Illuminate\Http\Request;

class ProprietarioController extends Controller
{
    public function index()
    {
        return Proprietario::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string',
            'nBilhete' => 'required|string|unique:proprietarios',
            'validadeBilhete' => 'required|date',
        ]);

        return Proprietario::create($request->all());
    }

    public function show($id)
    {
        return Proprietario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $proprietario = Proprietario::findOrFail($id);
        $proprietario->update($request->all());

        return $proprietario;
    }

    public function destroy($id)
    {
        return Proprietario::destroy($id);
    }
}
