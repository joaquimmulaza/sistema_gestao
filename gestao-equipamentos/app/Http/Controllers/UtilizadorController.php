<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilizador;
use Illuminate\Support\Facades\Hash;
use App\Models\Inspetor;
use Illuminate\Support\Facades\Validator;

class UtilizadorController extends Controller
{
    /**
     * Exibir lista de utilizadores.
     */
    public function index()
    {
        $utilizadores = Utilizador::all();
        return view('utilizadores.index', compact('utilizadores'));
    }

    /**
     * Mostrar um utilizador específico.
     */
    public function show($id)
    {
        $utilizador = Utilizador::findOrFail($id);
        return view('utilizadores.show', compact('utilizador'));
    }

    /**
     * Formulário para editar um utilizador.
     */
    public function edit($id)
    {
        $utilizador = Utilizador::findOrFail($id);
        return view('utilizadores.edit', compact('utilizador'));
    }

    /**
     * Atualizar dados de um utilizador.
     */
    public function update(Request $request, $id)
    {
        $utilizador = Utilizador::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'password' => 'nullable|string|min:4',
        ]);

        $utilizador->nome = $request->nome;
        
        if ($request->password) {
            $utilizador->password = Hash::make($request->password);
        }

        $utilizador->save();

        return redirect()->route('utilizadores.index')->with('success', 'Utilizador atualizado com sucesso.');
    }

    /**
     * Atribuir permissões a um utilizador.
     */
    public function atribuirPermissoes(Request $request, $id)
    {
        $utilizador = Utilizador::findOrFail($id);

        $request->validate([
            'permissoes' => 'required|json',
        ]);

        $utilizador->permissoes = $request->permissoes;
        $utilizador->save();

        return redirect()->route('utilizadores.index')->with('success', 'Permissões atribuídas com sucesso.');
    }

    /**
     * Registrar um inspetor.
     */
    public function createInspetor()
    {
        return view('utilizadores.create_inspector');
    }
    public function registrarInspetor(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:191',
        ]);

        $inspetor = Inspetor::create([
            'nome' => $request->nome,
        ]);

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:191|unique:inspetores,nome',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $inspetor = Inspetor::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('utilizadores.index')->with('success', 'Inspetor registrado com sucesso.');
    }


    /**
     * Editar um inspetor.
     */
    public function editarInspetor($id)
    {
        $inspetor = Utilizador::findOrFail($id);
        return view('utilizadores.edit-inspetor', compact('inspetor'));
    }

    public function destroy($id)
    {
        $utilizador = Utilizador::findOrFail($id);
        $utilizador->delete();
        return redirect()->route('utilizadores.index')->with('success', 'Utilizador deletado com sucesso!');
    }
}
