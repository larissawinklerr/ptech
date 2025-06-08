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
        // Atualiza dados da tabela animais
        $animal = Animal::findOrFail($id);
        $animal->update($request->only([
            'nome', 'status', 'peso', 'sexo', 'fertilidade'
        ]));

        // Atualiza dados da tabela animal_detalhes
        $detalhes = AnimalDetalhes::where('animal_id', $id)->firstOrFail();
        $detalhes->update([
            'nome'            => $request->input('nome'),
            'raca'            => $request->input('raca'),
            'peso_nascimento' => $request->input('peso_nascimento'),
            'peso_atual'      => $request->input('peso_atual'),
            'brinco_chip'     => $request->input('brinco_chip'),
            'rebanho_id'      => $request->filled('rebanho_id') ? $request->rebanho_id : null,
        ]);

        return redirect()->route('app.animais.index')->with('success', 'Animal atualizado com sucesso!');
    }

    public function show($id)
    {
        $animal = Animal::with('detalhes')->findOrFail($id);
        return view('app.animais.show', compact('animal'));
    }

    public function destroy($id)
{
    // Apaga os detalhes do animal primeiro
    AnimalDetalhes::where('animal_id', $id)->delete();

    // Agora pode apagar o animal
    Animal::destroy($id);

    return redirect()->route('app.animais.index')->with('success', 'Animal excluído com sucesso!');
}


    public function gerarRelatorio($id)
    {
        return "Relatório do animal ID: " . $id;
    }
}
