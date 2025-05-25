@extends('site.layouts.base')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">{{ isset($rebanho) ? 'Editar Rebanho' : 'Novo Rebanho' }}</h2>

    <form action="{{ isset($rebanho) ? route('app.rebanhos.update', $rebanho->id) : route('app.rebanhos.store') }}" method="POST">
        @csrf
        @if(isset($rebanho))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $rebanho->nome ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Selecionar Animais</label>
            <select name="animais[]" class="form-control" multiple>
                @foreach($animais as $animal)
                    <option value="{{ $animal->id }}">
                        {{ $animal->detalhes->nome ?? 'Sem nome' }} 
                        ({{ $animal->detalhes->brinco_chip ?? 'Sem chip' }})
                    </option>
                @endforeach

            </select>
            <small class="form-text text-muted">Segure Ctrl (ou Command no Mac) para selecionar múltiplos.</small>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('app.rebanhos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
