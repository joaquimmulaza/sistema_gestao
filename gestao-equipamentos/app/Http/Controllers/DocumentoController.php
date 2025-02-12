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
        return view('documentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:191',
            'data_validade' => 'required|date',
            'nome' => 'required|string|max:191',
            'url' => 'required|url|max:191',
            'instituicao_id' => 'nullable|exists:instituicoes,id',
            'vistoria_id' => 'nullable|exists:vistorias,id',
            'relatorio_id' => 'nullable|exists:vistorias,id'
        ]);

        Documento::create($request->all());
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
            'url' => 'required|url|max:191',
            'instituicao_id' => 'nullable|exists:instituicoes,id',
            'vistoria_id' => 'nullable|exists:vistorias,id',
            'relatorio_id' => 'nullable|exists:vistorias,id'
        ]);

        $documento = Documento::findOrFail($id);
        $documento->update($request->all());

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