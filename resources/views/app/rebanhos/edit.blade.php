@extends('site.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Rebanho</h2>

    <form action="{{ route('app.rebanhos.update', $rebanho->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Rebanho</label>
            <input type="text" name="nome" class="form-control" value="{{ $rebanho->nome }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('app.rebanhos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

