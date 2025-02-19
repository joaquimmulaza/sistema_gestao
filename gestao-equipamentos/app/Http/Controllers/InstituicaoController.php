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
            'municipio' => 'required',
            'comuna' => 'nullable',
            'distrito' => 'nullable',
        ]);

        

        // Cria a nova instituição
        $instituicao = Instituicao::create([
            'nome' => $request->nome,
            'activa' => (int) $request->activa,
            'data_registo' => $request->data_registo,
        ]);

        $instituicao->endereco()->create([
            'municipio' => $request->municipio,
            'comuna' => $request->comuna,
            'distrito' => $request->distrito,
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
            'nome' => 'required', // Campo obrigatório
            'activa' => 'required|boolean', // Campo activa deve ser um valor booleano
            'data_registo' => 'required|date', // Campo data_registo deve ser uma data válida
            'municipio' => 'required',
            'comuna' => 'nullable',
            'distrito' => 'nullable',
        ]);

        $activa = (int) $request->input('activa');

        // Atualiza os dados da instituição
        $instituicao->update([
            'nome' => $request->nome,
            'activa' => $activa,
            'data_registo' => $request->data_registo,
            // O Eloquent gerencia automaticamente os campos 'updated_at'
        ]);

         // Atualiza ou cria o endereço associado
        $instituicao->endereco()->updateOrCreate(
            ['instituicao_id' => $instituicao->id], // Condição para encontrar o endereço
            [
                'municipio' => $request->municipio,
                'comuna' => $request->comuna,
                'distrito' => $request->distrito,
            ]
        );

        return redirect()->route('instituicoes.index')->with('success', 'Instituição atualizada com sucesso!');
    }

    public function destroy(Instituicao $instituicao)
    {
        // Exclui a instituição
        $instituicao->delete();

        return redirect()->route('instituicoes.index')->with('success', 'Instituição excluída com sucesso!');
    }
}
