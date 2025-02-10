<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilizador;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nome' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['nome' => $credentials['nome'], 'password' => $credentials['password']])) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['nome' => 'Credenciais inválidas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
