<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rebanho;
use Illuminate\Support\Str;

class CorrigirRebanhosSeeder extends Seeder
{
    public function run()
    {
        $rebanhos = Rebanho::all();

        $nomesUnicos = [];

        foreach ($rebanhos as $rebanho) {
            $nomeNormalizado = Str::title(Str::lower(trim($rebanho->nome)));

            if (in_array($nomeNormalizado, $nomesUnicos)) {
                $rebanho->delete();
                continue;
            }

            $rebanho->nome = $nomeNormalizado;
            $rebanho->save();

            $nomesUnicos[] = $nomeNormalizado;
        }
    }
}
