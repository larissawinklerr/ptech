<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use App\Models\Animal;
use App\Models\Rebanho;
use Illuminate\Http\Request;

class ProcedimentoController extends Controller
{
    public function index()
    {
        $procedimentos = Procedimento::with('animal', 'rebanho')->get();
        return view('app.procedimentos.index', compact('procedimentos'));
    }

    public function create()
    {
        $animais = Animal::with('detalhes')->get();
        $rebanhos = \App\Models\Rebanho::all(); // <- Isso aqui garante que $rebanhos exista

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

        // Preenche o campo correto baseado na aplicação
        $dados = $validated;
        if ($request->aplicacao === 'Por lote') {
            $dados['animal_id'] = null; // garantir que seja nulo
        }

        Procedimento::create($dados);

        return redirect()->back()->with('success', 'Procedimento cadastrado com sucesso!');
    }


    public function edit($id)
    {
        $procedimento = Procedimento::findOrFail($id);
        $animais = Animal::with('detalhes')->get();
        $rebanhos = Rebanho::all();

        return view('app.procedimentos.edit', compact('procedimento', 'animais', 'rebanhos'));
    }

    public function update(Request $request, $id)
    {
        $procedimento = Procedimento::findOrFail($id);

        $rules = [
            'tipo' => 'required|string|max:255',
            'aplicacao' => 'required|string|max:255',
            'nome_procedimento' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
            'data' => 'required|date',
            'animal_id' => 'nullable|exists:animais,id',
            'rebanho_id' => 'nullable|exists:rebanhos,id',
        ];

        if ($request->aplicacao === 'Por animal') {
            $rules['animal_id'] = 'required|exists:animais,id';
            $request->merge(['rebanho_id' => null]);
        } elseif ($request->aplicacao === 'Por lote') {
            $rules['rebanho_id'] = 'required|exists:rebanhos,id';
            $request->merge(['animal_id' => null]);
        }

        $validated = $request->validate($rules);

        $procedimento->update($validated);

        return redirect()->route('app.procedimentos.index')->with('success', 'Procedimento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $procedimento = Procedimento::findOrFail($id);
        $procedimento->delete();

        return redirect()->back()->with('success', 'Procedimento removido com sucesso!');
    }
}
