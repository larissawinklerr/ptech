@extends('site.layouts.app')

@section('content')
<div class="container my-5">
    {{-- Cabeçalho com título e botão --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 fw-bold">Procedimentos</h2>
        <a href="{{ route('app.procedimentos.create') }}" class="btn btn-success">+ Novo Procedimento</a>
    </div>

    {{-- Lista de procedimentos --}}
    @foreach ($procedimentos as $procedimento)
        <div class="card shadow-sm p-3 mb-3">
            <p class="mb-1"><strong>- {{ $procedimento->descricao }}</strong> ({{ $procedimento->tipo }})</p>
            <p class="mb-1">Animal: {{ $procedimento->animal_id }}</p>
            <p class="mb-3">{{ $procedimento->data }}</p>
            <form action="{{ route('app.procedimentos.destroy', $procedimento->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
