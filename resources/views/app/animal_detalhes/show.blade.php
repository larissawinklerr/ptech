@extends('site.layouts.app')

@section('title', 'Detalhes do Animal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-5 mb-4">
            <div class="card-custom">
                <h3 class="mb-3">Detalhes do Animal</h3>
                <p><strong>Nome:</strong> {{ $animal->nome }}</p>
                <p><strong>Brinco/Chip:</strong> {{ $detalhes->brinco_chip }}</p>
                <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($detalhes->data_nascimento)->format('d/m/Y') }}</p>
                <p><strong>Raça:</strong> {{ $detalhes->raca }}</p>
                <p><strong>Peso ao nascer:</strong> {{ $detalhes->peso_nascimento }} kg</p>
                <p><strong>Peso atual:</strong> {{ $detalhes->peso_atual }} kg</p>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card-custom">
                <h4>Procedimentos</h4>
                @if($procedimentos->count())
                    <ul class="list-unstyled">
                        @foreach($procedimentos as $proc)
                            <li class="mb-3">
                                <strong>{{ $proc->nome }}</strong> ({{ $proc->tipo }} - {{ $proc->aplicacao }})<br>
                                {{ $proc->observacoes }}<br>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($proc->data)->format('d/m/Y') }}</small>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Nenhum procedimento registrado para este animal.</p>
                @endif
            </div>

            <div class="mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
