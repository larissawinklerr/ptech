@extends('site.layouts.app')


@section('content')
<div class="container mt-5">
    <h2>Detalhes do Animal</h2>

    <div class="card p-3 mt-3">
        <p><strong>Nome:</strong> {{ $animal->nome }}</p>
        <p><strong>Brinco/Chip:</strong> {{ $animal->brinco_chip }}</p>
        <p><strong>Peso Nascimento:</strong> {{ $animal->peso_nascimento }} kg</p>
        <p><strong>Peso Atual:</strong> {{ $animal->peso_atual ?? 'Não informado' }} kg</p>
        <p><strong>Raça:</strong> {{ $animal->raca }}</p>
    </div>

    <a href="{{ route('app.animais.index') }}" class="btn btn-secondary mt-3">Voltar para lista</a>
</div>
@endsection
