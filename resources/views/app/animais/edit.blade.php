@extends('site.layouts.app')


@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Editar Animal</h2>

    <form action="{{ route('app.animais.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $animal->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="brinco_chip" class="form-label">Brinco/Chip</label>
            <input type="text" name="brinco_chip" class="form-control" value="{{ $animal->brinco_chip }}">
        </div>

        <div class="mb-3">
            <label for="peso_nascimento" class="form-label">Peso ao nascer (kg)</label>
            <input type="number" name="peso_nascimento" class="form-control" value="{{ $animal->peso_nascimento }}" step="0.01">
        </div>

        <div class="mb-3">
            <label for="peso_atual" class="form-label">Peso atual (kg)</label>
            <input type="number" name="peso_atual" class="form-control" value="{{ $animal->peso_atual }}" step="0.01">
        </div>

        <div class="mb-3">
            <label for="raca" class="form-label">Raça</label>
            <input type="text" name="raca" class="form-control" value="{{ $animal->raca }}">
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>

        <div class="mb-3">
            <label for="rebanho_id" class="form-label">Rebanho</label>
            <select name="rebanho_id" class="form-control">
            <option value="">Selecione um rebanho</option>
            @foreach($rebanhos as $rebanho)
            <option value="{{ $rebanho->id }}">
                {{ $rebanho->nome }}
            </option>
            @endforeach
            </select>
</div>

    </form>
</div>
@endsection
