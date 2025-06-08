<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Rebanho;


class RelatorioController extends Controller
{
    public function index()
    {
        $rebanhos = Rebanho::orderBy('nome')->get();
        return view('app.relatorios.index', compact('rebanhos'));
    }

    public function filtrado(Request $request)
    {
        $query = Animal::query();

        // ✅ Filtro por rebanho (está em AnimalDetalhes)
        if ($request->filled('rebanho_id')) {
            $query->whereHas('detalhes', function ($q) use ($request) {
                $q->where('rebanho_id', $request->rebanho_id);
            });
        }

        // ✅ Filtro por nome do animal (direto em Animal)
        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $animais = $query->get();

        $pdf = Pdf::loadView('app.relatorios.animais', compact('animais'));
        return $pdf->download('relatorio_animais_filtrado.pdf');

        $query = Animal::with('detalhes');
    }
}
