<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rebanho;
use App\Models\Animal;
use App\Models\AnimalDetalhes;

class RebanhoController extends Controller
{
    public function index()
    {
        $rebanhos = Rebanho::all();
        return view('app.rebanhos.index', compact('rebanhos'));
    }

    public function create()
    {
        $animais = Animal::with('detalhes')->get();
        return view('app.rebanhos.create', compact('animais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'animais' => 'nullable|array',
            'animais.*' => 'exists:animais,id',
        ]);

        $rebanho = Rebanho::create([
            'nome' => $request->input('nome'),
        ]);

        if ($request->has('animais')) {
            AnimalDetalhes::whereIn('animal_id', $request->animais)
                          ->update(['rebanho_id' => $rebanho->id]);
        }

        return redirect()->route('app.rebanhos.index')->with('success', 'Rebanho criado com sucesso!');
    }

    // ✅ Agora o método show está fora do store, como deve ser
    public function show($id)
    {
        $rebanho = Rebanho::with('animais.detalhes')->findOrFail($id);
        return view('app.rebanhos.show', compact('rebanho'));
    }

    public function edit($id)
    {
        $rebanho = Rebanho::with('animais.detalhes')->findOrFail($id);
        $animais = Animal::with('detalhes')->get();
        $rebanhoAnimais = $rebanho->animais->pluck('id')->toArray();
        return view('app.rebanhos.edit', compact('rebanho', 'animais', 'rebanhoAnimais'));
    }

    public function update(Request $request, $id)
    {
        $rebanho = Rebanho::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'animais' => 'nullable|array',
            'animais.*' => 'exists:animais,id',
        ]);

        $rebanho->update([
            'nome' => $request->input('nome'),
        ]);

        AnimalDetalhes::where('rebanho_id', $rebanho->id)->update(['rebanho_id' => null]);

        if ($request->filled('animais')) {
            AnimalDetalhes::whereIn('animal_id', $request->animais)->update([
                'rebanho_id' => $rebanho->id
            ]);
        }

        return redirect()->route('app.rebanhos.index')->with('success', 'Rebanho atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Rebanho::destroy($id);
        return redirect()->route('app.rebanhos.index')->with('success', 'Rebanho excluído com sucesso!');
    }
}
