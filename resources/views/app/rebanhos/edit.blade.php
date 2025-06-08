@extends('site.layouts.app')
@section('title', 'Editar Rebanho')

@section('content')
    <div class="container my-5">
        <h1 class="text-center fw-bold mb-4" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.4); font-size: 2.5rem;">
            Editar Rebanho
        </h1>

        <div class="card shadow rounded p-4" style="background-color: rgba(255, 255, 255, 0.95);">
            <form action="{{ route('app.rebanhos.update', $rebanho->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nome" class="form-label fw-semibold">Nome do Rebanho</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $rebanho->nome }}"
                        required>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <a href="{{ route('app.rebanhos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>

            <hr>

            <h4 class="fw-bold mb-3">Animais do Rebanho</h4>
            @forelse ($rebanho->animais as $animal)
                <div class="d-flex justify-content-between align-items-center bg-light rounded p-2 mb-2">
                    <span>{{ $animal->nome }} - Brinco: {{ $animal->detalhes->brinco_chip ?? 'não informado' }}</span>
                    <form action="{{ route('rebanhos.remover.animal', $animal->id) }}" method="POST" class="ms-2">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                    </form>
                </div>
            @empty
                <p class="text-muted">Nenhum animal vinculado a este rebanho.</p>
            @endforelse
        </div>
    </div>
@endsection
