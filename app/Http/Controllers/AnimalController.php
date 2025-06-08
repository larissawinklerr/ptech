<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;
use App\Models\AnimalDetalhes;
use App\Models\Rebanho;
use App\Models\Procedimento;

class AnimalController extends Controller
{
    public function index()
    {
        $animais = Animal::with('detalhes')
            ->withCount('procedimentos')
            ->where('user_id', Auth::id())
            ->get();

        return view('app.animais.index', compact('animais'));
    }

    public function create()
    {
        $rebanhos = Rebanho::where('user_id', Auth::id())->get();
        return view('app.animais.create', compact('rebanhos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'status' => 'required',
            'sexo' => 'required',
            'fertilidade' => 'required',
            'data_nascimento' => 'required|date',
            'raca' => 'nullable|string|max:100',
            'peso_nascimento' => 'nullable|numeric',
            'peso_atual' => 'nullable|numeric',
            'brinco_chip' => 'required|unique:animal_detalhes,brinco_chip',
            'rebanho_id' => 'nullable|exists:rebanhos,id',
        ]);

        $animal = Animal::create([
            'nome' => $request->nome,
            'status' => $request->status,
            'sexo' => $request->sexo,
            'fertilidade' => $request->fertilidade,
            'user_id' => Auth::id(),
        ]);

        AnimalDetalhes::create([
            'animal_id'       => $animal->id,
            'nome'            => $request->input('nome'),
            'data_nascimento' => $request->input('data_nascimento'),
            'raca'            => $request->input('raca'),
            'peso_nascimento' => $request->input('peso_nascimento'),
            'peso_atual'      => $request->input('peso_atual'),
            'brinco_chip'     => $request->input('brinco_chip'),
            'rebanho_id'      => $request->input('rebanho_id'),
        ]);

        return redirect()->route('app.animais.index')->with('success', 'Animal cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $animal = Animal::with('detalhes')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $rebanhos = Rebanho::where('user_id', Auth::id())->get();

        return view('app.animais.edit', compact('animal', 'rebanhos'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $animal->update($request->only([
            'nome',
            'status',
            'sexo',
            'fertilidade'
        ]));

        $detalhes = AnimalDetalhes::where('animal_id', $id)->firstOrFail();

        $detalhes->update([
            'nome'            => $request->input('nome'),
            'raca'            => $request->input('raca'),
            'peso_nascimento' => $request->input('peso_nascimento'),
            'peso_atual'      => $request->input('peso_atual'),
            'brinco_chip'     => $request->input('brinco_chip'),
            'rebanho_id'      => $request->input('rebanho_id'),
        ]);

        return redirect()->route('app.animais.index')->with('success', 'Animal atualizado com sucesso!');
    }

    public function show($id)
    {
        $animal = Animal::with('detalhes')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $procedimentosDiretos = $animal->procedimentos;

        $procedimentosPorLote = collect();
        if ($animal->detalhes && !empty($animal->detalhes->rebanho_id)) {
            $procedimentosPorLote = \App\Models\Procedimento::where('rebanho_id', $animal->detalhes->rebanho_id)
                ->whereNull('animal_id')
                ->get();
        }

        $procedimentos = $procedimentosDiretos->merge($procedimentosPorLote);

        return view('app.animais.show', compact('animal', 'procedimentos'));
    }


    public function destroy($id)
    {
        $animal = Animal::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        AnimalDetalhes::where('animal_id', $id)->delete();
        $animal->delete();

        return redirect()->route('app.animais.index')->with('success', 'Animal excluído com sucesso!');
    }

    public function gerarRelatorio($id)
    {
        return "Relatório do animal ID: " . $id;
    }
}
