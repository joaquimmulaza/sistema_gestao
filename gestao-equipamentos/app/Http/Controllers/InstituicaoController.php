<?php
namespace App\Http\Controllers;
use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index()
    {
        // Exibe todas as instituições
        $instituicoes = Instituicao::all();
        return view('instituicoes.index', compact('instituicoes'));
    }

    public function create()
    {
        // Exibe o formulário de criação
        return view('instituicoes.create');
    }

    public function store(Request $request)
    {
        
        // Valida os campos obrigatórios e define regras para o campo 'activa'
        $request->validate([
            'nome' => 'required', // Campo obrigatório
            'activa' => 'required|boolean', // Campo activa deve ser um valor booleano
            'data_registo' => 'required|date', // Campo data_registo deve ser uma data válida
        ]);

        $activa = (int) $request->input('activa');

        // Cria a nova instituição
        Instituicao::create([
            'nome' => $request->nome,
            'activa' => $activa, // O valor de activa é atribuído
            'data_registo' => $request->data_registo, // O valor de data_registo é atribuído
            
        ]);

        return redirect()->route('instituicoes.index')->with('success', 'Instituição criada com sucesso!');
    }

    public function show(Instituicao $instituicao)
    {
        // Exibe os detalhes da instituição
        return view('instituicoes.show', compact('instituicao'));
    }

    public function edit(Instituicao $instituicao)
    {
        // Exibe o formulário de edição
       
        return view('instituicoes.edit', compact('instituicao'));
    }

    public function update(Request $request, Instituicao $instituicao)
    {
        // Valida os campos para atualização
        $request->validate([
            'nome' => 'required',
            'activa' => 'required|boolean', // Campo activa
            'data_registo' => 'required|date', // Campo data_registo
        ]);

        $activa = (int) $request->input('activa');

        // Atualiza os dados da instituição
        $instituicao->update([
            'nome' => $request->nome,
            'activa' => $activa,
            'data_registo' => $request->data_registo,
            // O Eloquent gerencia automaticamente os campos 'updated_at'
        ]);

        return redirect()->route('instituicoes.index')->with('success', 'Instituição atualizada com sucesso!');
    }

    public function destroy(Instituicao $instituicao)
    {
        // Exclui a instituição
        $instituicao->delete();

        return redirect()->route('instituicoes.index')->with('success', 'Instituição excluída com sucesso!');
    }
}
