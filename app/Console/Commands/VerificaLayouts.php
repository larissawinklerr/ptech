<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class VerificaLayouts extends Command
{
    // Nome do comando que será executado no terminal
    protected $signature = 'verifica:layouts';

    // Descrição que aparece com "php artisan list"
    protected $description = 'Verifica se os arquivos Blade estão usando os layouts corretos';

    public function handle()
    {
        // Coleta todos os arquivos Blade nas views públicas e internas
        $baseViews = glob(resource_path('views/site/**/*.blade.php'));
        $appViews = glob(resource_path('views/app/**/*.blade.php'));

        $errosPublicos = 0;
        $errosInternos = 0;

        // Verifica as views públicas
        $this->info("🔍 Verificando views públicas (esperado: @extends('site.layouts.base')):");
        foreach ($baseViews as $view) {
            $content = file_get_contents($view);
            if (!preg_match('/@extends\([\'"]site\.layouts\.base[\'"]\)/', $content)) {
                $this->warn("⚠️  Faltando extends em: " . str_replace(resource_path('views/'), '', $view));
                $errosPublicos++;
            }
            // Descomente se quiser ver os arquivos OK
            // else {
            //     $this->info("✅ OK: " . str_replace(resource_path('views/'), '', $view));
            // }
        }

        // Verifica as views internas
        $this->info("🔍 Verificando views internas (esperado: @extends('app.layouts.app')):");
        foreach ($appViews as $view) {
            $content = file_get_contents($view);
            if (!preg_match('/@extends\([\'"]app\.layouts\.app[\'"]\)/', $content)) {
                $this->warn("⚠️  Faltando extends em: " . str_replace(resource_path('views/'), '', $view));
                $errosInternos++;
            }
            // Descomente se quiser ver os arquivos OK
            // else {
            //     $this->info("✅ OK: " . str_replace(resource_path('views/'), '', $view));
            // }
        }

        // Exibe um resumo final
        $this->info("✅ Verificação concluída.");
        $this->line("➡️  Views públicas com problema: {$errosPublicos}");
        $this->line("➡️  Views internas com problema: {$errosInternos}");

        return $errosPublicos + $errosInternos === 0 ? Command::SUCCESS : Command::FAILURE;
    }
}
