<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Rebanho;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class RelatorioController extends Controller
{
    public function index()
    {
        $rebanhos = Rebanho::where('user_id', Auth::id())
            ->orderBy('nome')
            ->get();

        $animais = Animal::with('detalhes')
            ->where('user_id', Auth::id())
            ->orderBy('id')
            ->get();

        return view('app.relatorios.index', compact('rebanhos', 'animais'));
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
            $query->whereHas('detalhes', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->nome . '%');
            });
        }

        $animais = $query->with('detalhes')->where('user_id', Auth::id())->get();

        $pdf = Pdf::loadView('app.relatorios.animais', compact('animais'));
        return $pdf->download('relatorio_animais_filtrado.pdf');
    }

    public function todos()
    {
        $animais = Animal::with('detalhes')
            ->where('user_id', Auth::id())
            ->get();

        $pdf = Pdf::loadView('app.relatorios.animais', compact('animais'));
        return $pdf->download('relatorio_todos_animais.pdf');
    }
}
