<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended(route('app.painel'));
        }

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'E-mail e/ou senha não conferem.';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para acessar a página.';
        }

        return response()
            ->view('site.login', ['titulo' => 'Login', 'erro' => $erro])
            ->withHeaders([
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0',
                'Pragma' => 'no-cache',
                'Expires' => 'Sat, 01 Jan 2000 00:00:00 GMT',
                'X-Frame-Options' => 'DENY',
                'X-Content-Type-Options' => 'nosniff',
                'X-XSS-Protection' => '1; mode=block'
            ]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'email' => 'required|email',
            'senha' => 'required'
        ];

        $feedback = [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Digite um e-mail válido.',
            'senha.required' => 'O campo senha é obrigatório.'
        ];

        $request->validate($regras, $feedback);

        $credenciais = [
            'email' => $request->get('email'),
            'password' => $request->get('senha')
        ];

        if (Auth::attempt($credenciais)) {
            return redirect()->intended(route('app.painel'));
        } else {
            return redirect()
                ->route('site.login')
                ->withErrors(['credenciais' => 'E-mail e/ou senha incorretos.'])
                ->withInput($request->except('senha'));
        }
    }

    public function sair(Request $request)
    {
        // Limpa a sessão atual
        Session::flush();
        
        // Limpa todos os dados da sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Faz o logout
        Auth::logout();
        
        // Limpa todos os cookies relacionados à autenticação
        $recaller = Auth::getRecallerName();
        Cookie::queue(Cookie::forget($recaller));
        
        // Limpa o cache do navegador e adiciona headers de segurança
        return redirect()
            ->route('site.login')
            ->withHeaders([
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0',
                'Pragma' => 'no-cache',
                'Expires' => 'Sat, 01 Jan 2000 00:00:00 GMT',
                'X-Frame-Options' => 'DENY',
                'X-Content-Type-Options' => 'nosniff',
                'X-XSS-Protection' => '1; mode=block',
                //'Clear-Site-Data' => '"cache", "cookies", "storage"',
                'Location' => route('site.login')
            ])
            ->with('status', 'Logout realizado com sucesso!');
    }

    public function register()
    {
        return view('site.register', ['titulo' => 'Cadastro']);
    }
}