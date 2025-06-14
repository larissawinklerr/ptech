<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'email:test {email}';
    protected $description = 'Testa o envio de email usando as configurações do Brevo';

    public function handle()
    {
        $email = $this->argument('email');

        try {
            Mail::raw('Este é um email de teste do sistema.', function($message) use ($email) {
                $message->to($email)
                        ->subject('Teste de Email - Brevo');
            });

            $this->info('Email enviado com sucesso!');
        } catch (\Exception $e) {
            $this->error('Erro ao enviar email: ' . $e->getMessage());
        }
    }
} 