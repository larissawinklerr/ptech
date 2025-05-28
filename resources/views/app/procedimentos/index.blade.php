@extends('site.layouts.app')


@section('title', 'Procedimentos')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Procedimentos</h2>
        <a href="{{ route('app.procedimentos.create') }}" class="btn btn-success">+ Novo Procedimento</a>
    </div>

    @foreach ($procedimentos as $procedimento)
        <div class="card mb-3 shadow-sm" style="background-color: rgba(255, 255, 255, 0.95);">
            <div class="card-body">
                <p class="mb-1"><strong>- {{ $procedimento->descricao }}</strong> ({{ $procedimento->tipo }})</p>
                <p class="mb-1">Animal: {{ $procedimento->animal_id }}</p>
                <p class="mb-1">{{ $procedimento->detalhes }}</p>
                <p class="mb-3">{{ $procedimento->data }}</p>
                <form action="{{ route('app.procedimentos.destroy', $procedimento->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
