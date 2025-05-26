<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use App\Models\Animal;
use Illuminate\Http\Request;

class ProcedimentoController extends Controller
{
    public function index()
    {
        $procedimentos = Procedimento::with('animal')->get();
        return view('app.procedimentos.index', compact('procedimentos'));
    }

    public function create()
    {
        $animais = Animal::with('detalhes')->get(); 
        return view('app.procedimentos.create', compact('animais'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_id' => 'required|exists:animais,id',
            'tipo' => 'required|string|max:255',
            'aplicacao' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
            'data' => 'required|date',
        ]);

        Procedimento::create($validated);

        return redirect()->back()->with('success', 'Procedimento cadastrado com sucesso!');
    }

    public function destroy($id)
    {
        $procedimento = Procedimento::findOrFail($id);
        $procedimento->delete();

        return redirect()->back()->with('success', 'Procedimento removido com sucesso!');
    }
}
