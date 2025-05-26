@extends('site.layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes do Animal</h2>

    <div class="card p-4">
        <p><strong>Nome:</strong> {{ $animal->nome }}</p>
        <p><strong>Brinco/Chip:</strong> {{ $detalhes->brinco_chip }}</p>
        <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($detalhes->data_nascimento)->format('d/m/Y') }}</p>
        <p><strong>Raça:</strong> {{ $detalhes->raca }}</p>
        <p><strong>Peso ao nascer:</strong> {{ $detalhes->peso_nascimento }} kg</p>
        <p><strong>Peso atual:</strong> {{ $detalhes->peso_atual }} kg</p>
    </div>

    <div class="mt-4">
        <h4>Procedimentos</h4>
        @if($procedimentos->count())
            <ul>
                @foreach($procedimentos as $proc)
                    <li>
                        <strong>{{ $proc->nome }}</strong> ({{ $proc->tipo }} - {{ $proc->aplicacao }})<br>
                        {{ $proc->observacoes }}<br>
                        <small>{{ \Carbon\Carbon::parse($proc->data)->format('d/m/Y') }}</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Nenhum procedimento registrado para este animal.</p>
        @endif
    </div>

    <a href="{{ route('app.animal_detalhes.edit', $animal->id) }}" class="btn btn-primary mt-3">Editar Detalhes</a>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
