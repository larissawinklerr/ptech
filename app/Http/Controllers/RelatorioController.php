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
        $rebanhos = Rebanho::where('user_id', auth()->id())
            ->orderBy('nome')
            ->get();

        return view('app.relatorios.index', compact('rebanhos'));
    }

    public function filtrado(Request $request)
    {
        $query = Animal::query();

        if ($request->filled('rebanho_id')) {
            $query->whereHas('detalhes', function ($q) use ($request) {
                $q->where('rebanho_id', $request->rebanho_id);
            });
        }

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $animais = $query->get();

        $pdf = Pdf::loadView('app.relatorios.animais', compact('animais'));
        return $pdf->download('relatorio_animais_filtrado.pdf');

        $query = Animal::with('detalhes');
    }

    public function todos()
    {
        $animais = \App\Models\Animal::with('detalhes')->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('app.relatorios.animais', compact('animais'));
        return $pdf->download('relatorio_todos_animais.pdf');
    }
}
