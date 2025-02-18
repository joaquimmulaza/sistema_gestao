<?php 

namespace App\Http\Controllers;

use App\Models\Relatorio;
use App\Models\Vistoria;
use Illuminate\Http\Request;
use App\Models\Inspetor;
use PDF;

class RelatorioController extends Controller
{
    public function index()
    {
        $relatorios = Relatorio::with('vistoria')->paginate(10);
        return view('relatorios.index', compact('relatorios'));
    }

    public function create()
    {
        $vistorias = Vistoria::all();
        $inspetores = Inspetor::all();
        return view('relatorios.create', compact('vistorias', 'inspetores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:191',
            'data' => 'required|date',
            'descricao' => 'required',
            'vistoria_id' => 'required|exists:vistorias,id',
        ]);

        Relatorio::create($request->all());

        return redirect()->route('relatorios.index')->with('success', 'Relatório criado com sucesso!');
    }

    public function show($id)
    {
        $relatorio = Relatorio::with('inspetor')->findOrFail($id);
        return view('relatorios.show', compact('relatorio',));
    }

    public function edit(Relatorio $relatorio)
    {
        $vistorias = Vistoria::all();
        $inspetores = Inspetor::all();
        return view('relatorios.edit', compact('relatorio', 'vistorias', 'inspetores'));
    }

    public function update(Request $request, Relatorio $relatorio)
    {
        $request->validate([
            'titulo' => 'required|string|max:191',
            'data' => 'required|date',
            'descricao' => 'required',
            'vistoria_id' => 'nullable|exists:vistorias,id',
        ]);

        $relatorio->update($request->all());

        return redirect()->route('relatorios.index')->with('success', 'Relatório atualizado com sucesso!');
    }

    public function destroy(Relatorio $relatorio)
    {
        $relatorio->delete();
        return redirect()->route('relatorios.index')->with('success', 'Relatório excluído com sucesso!');
    }

    public function listarPorVistoria($vistoria_id)
    {
        $relatorios = Relatorio::where('vistoria_id', $vistoria_id)->get();
        return view('relatorios.listar_por_vistoria', compact('relatorios'));
    }

    public function gerarPDF(Relatorio $relatorio)
    {
        $pdf = PDF::loadView('relatorios.pdf', compact('relatorio'));
        return $pdf->download('relatorio_'.$relatorio->id.'.pdf');
    }

}