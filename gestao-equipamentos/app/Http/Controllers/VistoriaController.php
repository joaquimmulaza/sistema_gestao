<?php

namespace App\Http\Controllers;

use App\Models\Vistoria;
use App\Models\Instituicao;
use Illuminate\Http\Request;

class VistoriaController extends Controller
{
    public function index()
    {
        $vistorias = Vistoria::with('instituicao')->get();
        return view('vistorias.index', compact('vistorias'));
    }

    public function create()
    {
        $instituicoes = Instituicao::all();
        return view('vistorias.create', compact('instituicoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'instituicao_id' => 'required|exists:instituicaos,id',
        ]);

        Vistoria::create($request->all());

        return redirect()->route('vistorias.index')->with('success', 'Vistoria criada com sucesso!');
    }

    public function show(Vistoria $vistoria)
    {
        return view('vistorias.show', compact('vistoria'));
    }

    public function edit(Vistoria $vistoria)
    {
        $instituicoes = Instituicao::all();
        return view('vistorias.edit', compact('vistoria', 'instituicoes'));
    }

    public function update(Request $request, Vistoria $vistoria)
    {
        $request->validate([
            'data' => 'required|date',
            'instituicao_id' => 'required|exists:instituicaos,id',
        ]);

        $vistoria->update($request->all());

        return redirect()->route('vistorias.index')->with('success', 'Vistoria atualizada com sucesso!');
    }

    public function destroy(Vistoria $vistoria)
    {
        $vistoria->delete();
        return redirect()->route('vistorias.index')->with('success', 'Vistoria deletada com sucesso!');
    }

    public function listarPorInstituicao($instituicao_id)
    {
        $vistorias = Vistoria::where('instituicao_id', $instituicao_id)->get();
        return view('vistorias.listar_por_instituicao', compact('vistorias', 'instituicao_id'));
    }
}
