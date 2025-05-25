<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'E-mail e/ou senha não conferem.';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para acessar a página.';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'email' => 'required|email',
            'senha' => 'required'
        ];

        $feedback = [
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Informe um e-mail válido',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $credenciais = [
            'email' => $request->get('email'),
            'password' => $request->get('senha')
        ];

        if (Auth::attempt($credenciais)) {
            return redirect()->route('app.painel');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('site.login');
    }
}
