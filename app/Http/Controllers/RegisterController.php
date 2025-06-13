<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('site.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'senha' => [
                'required',
                'string',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[0-9].*[0-9].*[0-9].*[0-9].*[0-9].*[0-9]).*$/'
            ],
            'confirmarSenha' => 'required|string|min:6|same:senha',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais que 255 caracteres.',
            
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Digite um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'email.regex' => 'O formato do e-mail é inválido.',
            
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.string' => 'A senha deve ser um texto.',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'senha.regex' => 'A senha deve conter pelo menos uma letra maiúscula, um caractere especial e 6 números.',
            
            'confirmarSenha.required' => 'O campo confirmar senha é obrigatório.',
            'confirmarSenha.string' => 'A confirmação de senha deve ser um texto.',
            'confirmarSenha.min' => 'A confirmação de senha deve ter no mínimo 6 caracteres.',
            'confirmarSenha.same' => 'As senhas não coincidem.'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'confirmPassword' => Hash::make($request->confirmarSenha),
        ]);

        return redirect()->route('site.login')->with('success', 'Cadastro realizado com sucesso!');
    }
}
