<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class VerificaLayouts extends Command
{
    protected $signature = 'verifica:layouts';
    protected $description = 'Verifica se os arquivos Blade estão usando os layouts corretos';

    public function handle()
    {
        $baseViews = glob(resource_path('views/site/**/*.blade.php'));
        $appViews = glob(resource_path('views/app/**/*.blade.php'));

        $this->info("🔍 Verificando views públicas (devem ter @extends('site.layouts.base')):");
        foreach ($baseViews as $view) {
            $content = file_get_contents($view);
            if (!Str::contains($content, "@extends('site.layouts.base")) {
                $this->warn("⚠️  Faltando extends em: " . str_replace(resource_path('views/'), '', $view));
            }
        }

        $this->info("\n🔍 Verificando views internas (devem ter @extends('app.layouts.app')):");
        foreach ($appViews as $view) {
            $content = file_get_contents($view);
            if (!Str::contains($content, "@extends('app.layouts.app")) {
                $this->warn("⚠️  Faltando extends em: " . str_replace(resource_path('views/'), '', $view));
            }
        }

        $this->info("\n✅ Verificação concluída.");
    }
}
