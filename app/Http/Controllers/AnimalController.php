<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\AnimalDetalhes;
use App\Models\Rebanho;

class AnimalController extends Controller
{
    public function index()
    {
        $animais = Animal::with('detalhes')->withCount('procedimentos')->get();
        return view('app.animais.index', compact('animais'));
    }

    public function create()
    {
        $rebanhos = Rebanho::all();
        return view('app.animais.create', compact('rebanhos'));
    }

    public function store(Request $request)
    {
        // Cria o animal (tabela animais)
        $animal = Animal::create($request->only([
            'nome', 'status', 'peso', 'sexo', 'fertilidade'
        ]));

        // Cria os detalhes (tabela animal_detalhes)
        AnimalDetalhes::create([
            'animal_id'        => $animal->id,
            'nome'             => $request->input('nome'),
            'data_nascimento'  => $request->input('data_nascimento'),
            'raca'             => $request->input('raca'),
            'peso_nascimento'  => $request->input('peso_nascimento'),
            'peso_atual'       => $request->input('peso_atual'),
            'brinco_chip'      => $request->input('brinco_chip'),
            'rebanho_id'       => $request->filled('rebanho_id') ? $request->rebanho_id : null,
        ]);

        return redirect()->route('app.animais.index');
    }

    public function edit($id)
    {
        $animal = Animal::with('detalhes')->findOrFail($id);
        $rebanhos = Rebanho::all();
        return view('app.animais.edit', compact('animal', 'rebanhos'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->update($request->all());
        return redirect()->route('app.animais.index');
    }

    public function show($id)
    {
        $animal = Animal::with('detalhes')->findOrFail($id);
        return view('app.animais.show', compact('animal'));
    }

    public function destroy($id)
    {
        Animal::destroy($id);
        return redirect()->route('app.animais.index');
    }

    public function gerarRelatorio($id)
    {
        return "Relatório do animal ID: " . $id;
    }
}

