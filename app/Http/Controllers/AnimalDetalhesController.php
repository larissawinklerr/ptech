<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnimalDetalhes;
use App\Models\Animal;

class AnimalDetalhesController extends Controller
{
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        $detalhes = AnimalDetalhes::where('animal_id', $id)->first();

        return view('app.animal_detalhes.show', compact('animal', 'detalhes'));
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $detalhes = AnimalDetalhes::where('animal_id', $id)->first();

        return view('app.animal_detalhes.edit', compact('animal', 'detalhes'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $detalhes = AnimalDetalhes::where('animal_id', $id)->first();

        if ($detalhes) {
            $detalhes->update($request->all());
        } else {
            $request['animal_id'] = $id;
            AnimalDetalhes::create($request->all());
        }

        return redirect()->route('app.animais.show', $animal->id)->with('success', 'Detalhes atualizados com sucesso!');
    }
}
