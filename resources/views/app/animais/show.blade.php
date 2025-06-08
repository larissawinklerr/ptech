@extends('site.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Detalhes do Animal</h2>

        <div class="card p-3 mt-3">
            <p><strong>Nome:</strong> {{ $animal->nome }}</p>
            <p><strong>Brinco/Chip:</strong> {{ $animal->detalhes->brinco_chip }}</p>
            <p><strong>Peso Nascimento:</strong> {{ $animal->detalhes->peso_nascimento }} kg</p>
            <p><strong>Peso Atual:</strong> {{ $animal->detalhes->peso_atual ?? 'Não informado' }} kg</p>
            <p><strong>Raça:</strong> {{ $animal->detalhes->raca }}</p>
        </div>

        <div class="card p-3 mt-4">
            <h4>Procedimentos</h4>
            @if ($procedimentos->isEmpty())
                <p>Nenhum procedimento registrado para este animal.</p>
            @else
                <ul>
                    @foreach ($procedimentos as $proc)
                        <li>
                            {{ $proc->nome_procedimento ?? 'Sem nome' }}
                            ({{ $proc->aplicacao ?? '-' }} -
                            {{ \Carbon\Carbon::parse($proc->data)->format('d/m/Y') }})
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>

        <a href="{{ route('app.animais.index') }}" class="btn btn-secondary mt-3">Voltar para lista</a>
    </div>
@endsection
