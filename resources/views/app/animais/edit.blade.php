@extends('site.layouts.app')

@section('title', 'Editar Animal')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center fw-bold text-uppercase mb-4 title-shadow">EDITAR ANIMAL</h1>

        <div class="card p-4 shadow rounded-4 bg-light bg-opacity-75">
            <form action="{{ route('app.animais.update', $animal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ $animal->detalhes->nome }}" required>
                </div>

                <div class="mb-3">
                    <label for="brinco_chip" class="form-label">Brinco/Chip</label>
                    <input type="text" name="brinco_chip" class="form-control"
                        value="{{ $animal->detalhes->brinco_chip }}">
                </div>

                <div class="mb-3">
                    <label for="peso_nascimento" class="form-label">Peso ao nascer (kg)</label>
                    <input type="number" name="peso_nascimento" class="form-control"
                        value="{{ $animal->detalhes->peso_nascimento }}" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="peso_atual" class="form-label">Peso atual (kg)</label>
                    <input type="number" name="peso_atual" class="form-control" value="{{ $animal->detalhes->peso_atual }}"
                        step="0.01">
                </div>

                <div class="mb-3">
                    <label for="raca" class="form-label">Raça</label>
                    <input type="text" name="raca" class="form-control" value="{{ $animal->detalhes->raca }}">
                </div>

                <div class="mb-3">
                    <label for="rebanho_id" class="form-label">Rebanho</label>
                    <select name="rebanho_id" class="form-select">
                        <option value="">Selecione um rebanho</option>
                        @foreach ($rebanhos as $rebanho)
                            <option value="{{ $rebanho->id }}"
                                {{ $animal->detalhes->rebanho_id == $rebanho->id ? 'selected' : '' }}>
                                {{ $rebanho->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                    <a href="{{ route('app.animais.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
