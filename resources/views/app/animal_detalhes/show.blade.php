@extends('site.layouts.base')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detalhes do Animal</h2>

    @if($detalhes)
        <div class="card card-custom p-4">
            <p><strong>Nome:</strong> {{ $detalhes->nome }}</p>
            <p><strong>Brinco/Chip:</strong> {{ $detalhes->brinco_chip }}</p>
            <p><strong>Data de Nascimento:</strong> {{ $detalhes->data_nascimento }}</p>
            <p><strong>Raça:</strong> {{ $detalhes->raca }}</p>
            <p><strong>Peso ao nascer:</strong> {{ $detalhes->peso_nascimento }} kg</p>
            <p><strong>Peso atual:</strong> {{ $detalhes->peso_atual }} kg</p>
        </div>
        <a href="{{ route('app.animal_detalhes.edit', $detalhes->animal_id) }}" class="btn btn-primary mt-3">Editar Detalhes</a>
    @else
        <p>Detalhes não encontrados.</p>
    @endif

    <a href="{{ route('app.animais.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
