<?php 

namespace App\Http\Controllers;

use App\Models\Relatorio;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index()
    {
        return Relatorio::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        return Relatorio::create($request->all());
    }

    public function show($id)
    {
        return Relatorio::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $relatorio = Relatorio::findOrFail($id);
        $relatorio->update($request->all());

        return $relatorio;
    }

    public function destroy($id)
    {
        return Relatorio::destroy($id);
    }
}
