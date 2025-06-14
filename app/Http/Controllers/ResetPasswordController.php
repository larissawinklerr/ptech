<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request)
    {
        return view('site.auth.reset-password', [
            'token' => $request->token,
            'email' => $request->email
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[0-9].*[0-9].*[0-9].*[0-9].*[0-9].*[0-9]).*$/'
            ],
        ], [
            'token.required' => 'Token de redefinição inválido.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Digite um e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'A senha deve ser um texto.',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'password.confirmed' => 'A confirmação de senha não confere.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, um caractere especial e 6 números.'
        ]);

        $user = User::where('email', $request->email)
                   ->where('remember_token', $request->token)
                   ->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Token inválido ou expirado.']);
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        return redirect()->route('site.login')
            ->with('status', 'Senha redefinida com sucesso!');
    }
} 