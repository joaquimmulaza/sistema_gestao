<?php
namespace App\Http\Controllers;

use App\Models\Utilizador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilizadorController extends Controller
{
    public function index()
    {
        return Utilizador::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'senha' => 'required|string|min:6',
        ]);

        return Utilizador::create([
            'nome' => $request->nome,
            'senha' => Hash::make($request->senha),
        ]);
    }

    public function show($id)
    {
        return Utilizador::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $utilizador = Utilizador::findOrFail($id);
        $utilizador->update($request->all());

        return $utilizador;
    }

    public function destroy($id)
    {
        return Utilizador::destroy($id);
    }
}
