<?php 
namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Instituicao;
use App\Models\Vistoria;
use App\Models\Relatorio;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $documento = Documento::all();
        $instituicoes = Instituicao::all();
        $vistorias = Vistoria::all();
        $relatorios = Relatorio::all();
        return view('documentos.create', compact('documento', 'instituicoes', 'vistorias', 'relatorios'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'tipo' => 'required|string|max:191',
            'data_validade' => 'required|date',
            'nome' => 'required|string|max:191',
            'documento' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'instituicao_id' => 'nullable|exists:instituicoes,id',
            'vistoria_id' => 'nullable|exists:vistorias,id',
            'relatorio_id' => 'nullable|exists:relatorios,id'
        ]);

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $path = $file->store('documentos', 'public'); // Salva o arquivo na pasta 'storage/app/public/documentos'
        }
    
        Documento::create([
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'data_validade' => $request->data_validade,
            'caminho_arquivo' => $path ?? null, // Salva o caminho do arquivo no banco de dados
            'instituicao_id' => $request->instituicao_id,
            'vistoria_id' => $request->vistoria_id,
            'relatorio_id' => $request->relatorio_id,
        ]);

        return redirect()->route('documentos.index')->with('success', 'Documento cadastrado com sucesso!');
    }

    public function show($id)
    {
        $documento = Documento::findOrFail($id);
        return view('documentos.show', compact('documento'));
    }

    public function edit($id)
    {
        $documento = Documento::findOrFail($id);
        $instituicoes = Instituicao::all();
        $vistorias = Vistoria::all();
        $relatorios = Relatorio::all();
        
        return view('documentos.edit', compact('documento', 'instituicoes', 'vistorias', 'relatorios'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'tipo' => 'required|string|max:191',
        'data_validade' => 'required|date',
        'nome' => 'required|string|max:191',
        'documento' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'instituicao_id' => 'nullable|exists:instituicoes,id',
        'vistoria_id' => 'nullable|exists:vistorias,id',
        'relatorio_id' => 'nullable|exists:relatorios,id'
    ]);

    $documento = Documento::findOrFail($id);
    $dados = $request->except('documento'); // Pega todos os dados, menos o arquivo

    if ($request->hasFile('documento')) {
        // Deleta o arquivo antigo, se existir
        if ($documento->caminho_arquivo && \Storage::disk('public')->exists($documento->caminho_arquivo)) {
            \Storage::disk('public')->delete($documento->caminho_arquivo);
        }

        // Armazena o novo arquivo
        $novoCaminho = $request->file('documento')->store('documentos', 'public');
        $dados['caminho_arquivo'] = $novoCaminho;
    }

    // Atualiza os dados no banco
    $documento->update($dados);

    return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso!');
}


    public function destroy($id)
    {
        Documento::destroy($id);
        return redirect()->route('documentos.index')->with('success', 'Documento excluído com sucesso!');
    }

    public function listarPorInstituicao($instituicaoId)
    {
        $documentos = Documento::where('instituicao_id', $instituicaoId)->get();
        return view('documentos.index', compact('documentos'));
    }

    public function listarPorVistoria($vistoriaId)
    {
        $documentos = Documento::where('vistoria_id', $vistoriaId)->get();
        return view('documentos.index', compact('documentos'));
    }

    public function listarPorRelatorio($relatorioId)
    {
        $documentos = Documento::where('relatorio_id', $relatorioId)->get();
        return view('documentos.index', compact('documentos'));
    }
}