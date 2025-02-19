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

    // public function listarInspetor()
    // {
    //     $inspetores = Inspetor::all();
    //     return view('inspetores.index', compact('inspetores'));
    // }

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
        return view('inspetores.create');
    }
    public function registrarInspetor(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:191',
        ]);

    
        $inspetor = Inspetor::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('inspetores.index')->with('success', 'Inspetor registrado com sucesso.');
    }

    public function index_inspetor()
    {
        $inspetores = Inspetor::all();
        return view('inspetores.index', compact('inspetores'));
    }


    /**
     * Editar um inspetor.
     */
    public function editarInspetor($id)
    {
        $inspetor = Inspetor::findOrFail($id);
        return view('inspetores.edit', compact('inspetor'));
    }

    public function updateInspetor(Request $request, $id)
    {
        $inspetor = Inspetor::findOrFail($id);

        $request -> validate([
            'nome' => 'required|string|max:191' . $id
        ]);

        $inspetor->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('inspetores.index')->with('sucess', 'Inspetor atualizado com sucesso');
    }

    public function destroyInspetor($id)
    {
        $inspetor = Inspetor::findOrFail($id);
        $inspetor->delete();

        return redirect()->route('inspetores.index')->with('success', 'Inspetor removido com sucesso.');
    }

    public function destroy($id)
    {
        $utilizador = Utilizador::findOrFail($id);
        $utilizador->delete();
        return redirect()->route('utilizadores.index')->with('success', 'Utilizador deletado com sucesso!');
    }
}
