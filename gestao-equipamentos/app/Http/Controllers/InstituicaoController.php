<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index()
    {
        return Instituicao::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'activa' => 'required|boolean',
            'dataRegistro' => 'required|date',
        ]);

        return Instituicao::create($request->all());
    }

    public function show($id)
    {
        return Instituicao::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $instituicao = Instituicao::findOrFail($id);
        $instituicao->update($request->all());

        return $instituicao;
    }

    public function destroy($id)
    {
        return Instituicao::destroy($id);
    }
}
