@extends('site.layouts.base')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Editar Detalhes do Animal</h2>

        <form action="{{ route('app.animal_detalhes.update', $detalhes->animal_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ $detalhes->nome }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Brinco/Chip</label>
                <input type="text" name="brinco_chip" class="form-control" value="{{ $detalhes->brinco_chip }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" value="{{ $detalhes->data_nascimento }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Raça</label>
                <input type="text" name="raca" class="form-control" value="{{ $detalhes->raca }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Peso ao nascer (kg)</label>
                <input type="number" name="peso_nascimento" step="0.01" class="form-control"
                    value="{{ $detalhes->peso_nascimento }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Peso atual (kg)</label>
                <input type="number" name="peso_atual" step="0.01" class="form-control"
                    value="{{ $detalhes->peso_atual }}">
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('app.animal_detalhes.show', $detalhes->animal_id) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
