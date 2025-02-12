<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
use Illuminate\Http\Request;

class ProprietarioController extends Controller
{
    public function index()
    {
        $proprietarios = Proprietario::all();
        return view('proprietarios.index', compact('proprietarios'));
    }

    public function create()
    {
        return view('proprietarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'n_bilhete' => 'required|unique:proprietarios',
            'validade_bilhete' => 'required|date',
        ]);

        Proprietario::create($request->all());

        return redirect()->route('proprietarios.index')->with('success', 'Proprietário cadastrado com sucesso!');
    }

    public function show(Proprietario $proprietario)
    {
        return view('proprietarios.show', compact('proprietario'));
    }

    public function edit(Proprietario $proprietario)
    {
        return view('proprietarios.edit', compact('proprietario'));
    }

    public function update(Request $request, Proprietario $proprietario)
    {
        $request->validate([
            'nome' => 'required',
            'n_bilhete' => 'required|unique:proprietarios,n_bilhete,' . $proprietario->id,
            'validade_bilhete' => 'required|date',
        ]);

        $proprietario->update($request->all());

        return redirect()->route('proprietarios.index')->with('success', 'Proprietário atualizado com sucesso!');
    }

    public function destroy(Proprietario $proprietario)
    {
        $proprietario->delete();

        return redirect()->route('proprietarios.index')->with('success', 'Proprietário excluído com sucesso!');
    }
}
