<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProprietarioController extends Controller
{
    public function index()
    {
        $proprietarios = Proprietario::with('instituicao')->get();
        return view('proprietarios.index', compact('proprietarios'));
    }

    public function create()
    {
        $instituicoes = Instituicao::all();
        return view('proprietarios.create', compact('instituicoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'n_bilhete' => 'required|unique:proprietarios',
            'validade_bilhete' => 'required|date',
            'instituicao_id' => 'nullable|exists:instituicoes,id'
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
        $instituicoes = Instituicao::all();
        return view('proprietarios.edit', compact('proprietario', 'instituicoes'));
    }

    public function update(Request $request, Proprietario $proprietario)
    {
        $request->validate([
            'nome' => 'required',
            'n_bilhete' => 'required|unique:proprietarios,n_bilhete,' . $proprietario->id,
            'validade_bilhete' => 'required|date',
            'instituicao_id' => 'nullable|exists:instituicoes,id',
        ]);

        try {
            $proprietario->update($request->all());
            return redirect()->route('proprietarios.index')->with('success', 'Proprietário atualizado com sucesso!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Código de erro para duplicação no MySQL
                return redirect()->back()->withErrors(['instituicao_id' => 'Esta instituição já está associada a outro proprietário.'])->withInput();
            }
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro inesperado.'])->withInput();
        }
    }

    public function destroy(Proprietario $proprietario)
    {
        $proprietario->delete();

        return redirect()->route('proprietarios.index')->with('success', 'Proprietário excluído com sucesso!');
    }
}
