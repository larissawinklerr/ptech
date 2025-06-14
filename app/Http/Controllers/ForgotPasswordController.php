<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('site.auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Digite um e-mail válido.',
            'email.exists' => 'Não encontramos um usuário com este e-mail.'
        ]);

        try {
            $user = User::where('email', $request->email)->first();
            
            if (!$user) {
                return back()->withErrors(['email' => 'Não encontramos um usuário com este e-mail.']);
            }

            // Gerar token de redefinição
            $token = Str::random(64);
            
            // Salvar token no banco de dados
            $user->forceFill([
                'remember_token' => $token,
            ])->save();

            // Log para debug
            Log::info('Iniciando processo de envio de email de recuperação');
            Log::info('Email do usuário: ' . $user->email);
            Log::info('Token gerado: ' . $token);

            // Enviar email
            $resetLink = route('password.reset', ['token' => $token, 'email' => $user->email]);
            Log::info('Link de recuperação gerado: ' . $resetLink);

            try {
                Mail::to($user->email)->send(new ResetPasswordMail($resetLink));
                Log::info('Email enviado com sucesso para: ' . $user->email);
            } catch (\Exception $mailException) {
                Log::error('Erro específico no envio do email: ' . $mailException->getMessage());
                Log::error('Stack trace do erro de email: ' . $mailException->getTraceAsString());
                throw $mailException;
            }

            return back()->with('status', 'Enviamos um link de recuperação para seu e-mail!');
        } catch (\Exception $e) {
            Log::error('Erro ao processar recuperação de senha: ' . $e->getMessage());
            Log::error('Stack trace completo: ' . $e->getTraceAsString());
            
            return back()->withErrors(['email' => 'Não foi possível enviar o link de recuperação. Por favor, tente novamente mais tarde.']);
        }
    }
} 