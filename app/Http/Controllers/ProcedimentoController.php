<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use App\Models\Animal;
use App\Models\Rebanho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcedimentoController extends Controller
{
    public function index()
    {
        $procedimentos = Procedimento::with('animal.detalhes', 'rebanho')
            ->where('user_id', Auth::id())
            ->get();

        return view('app.procedimentos.index', compact('procedimentos'));
    }

    public function create()
    {
        $animais = Animal::with('detalhes')->where('user_id', Auth::id())->get();
        $rebanhos = Rebanho::where('user_id', Auth::id())->get();

        return view('app.procedimentos.create', compact('animais', 'rebanhos'));
    }

    public function store(Request $request)
    {
        $rules = [
            'tipo' => 'required|string|max:255',
            'aplicacao' => 'required|string|max:255',
            'nome_procedimento' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
            'data' => 'required|date',
        ];

        if ($request->aplicacao === 'Por animal') {
            $rules['animal_id'] = 'required|exists:animais,id';
        } elseif ($request->aplicacao === 'Por lote') {
            $rules['rebanho_id'] = 'required|exists:rebanhos,id';
        }

        $validated = $request->validate($rules);

        $validated['user_id'] = Auth::id();

        if ($request->aplicacao === 'Por lote') {
            $validated['animal_id'] = null;
        } else {
            $validated['rebanho_id'] = null;
        }

        Procedimento::create($validated);

        return redirect()->route('app.procedimentos.index')->with('success', 'Procedimento cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $procedimento = Procedimento::where('user_id', Auth::id())->findOrFail($id);
        $animais = Animal::with('detalhes')->where('user_id', Auth::id())->get();
        $rebanhos = Rebanho::where('user_id', Auth::id())->get();

        return view('app.procedimentos.edit', compact('procedimento', 'animais', 'rebanhos'));
    }

    public function update(Request $request, $id)
    {
        $procedimento = Procedimento::where('user_id', Auth::id())->findOrFail($id);

        $rules = [
            'tipo' => 'required|string|max:255',
            'aplicacao' => 'required|string|max:255',
            'nome_procedimento' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
            'data' => 'required|date',
        ];

        if ($request->aplicacao === 'Por animal') {
            $rules['animal_id'] = 'required|exists:animais,id';
        } elseif ($request->aplicacao === 'Por lote') {
            $rules['rebanho_id'] = 'required|exists:rebanhos,id';
        }

        $validated = $request->validate($rules);
        $validated['user_id'] = Auth::id();

        if ($request->aplicacao === 'Por lote') {
            $validated['animal_id'] = null;
        } else {
            $validated['rebanho_id'] = null;
        }

        $procedimento->update($validated);

        return redirect()->route('app.procedimentos.index')->with('success', 'Procedimento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $procedimento = Procedimento::where('user_id', Auth::id())->findOrFail($id);
        $procedimento->delete();

        return redirect()->back()->with('success', 'Procedimento removido com sucesso!');
    }
}
