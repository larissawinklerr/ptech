@extends('site.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Rebanho: {{ $rebanho->nome }}</h2>

        <h4 class="mt-4">Animais no Rebanho:</h4>

        @if ($rebanho->animais->count() > 0)
            <ul>
                @foreach ($rebanho->animais as $animal)
                    <li>
                        {{ $animal->detalhes->nome ?? 'Sem nome' }} -
                        {{ $animal->detalhes->brinco_chip ?? 'Sem chip' }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>Este rebanho ainda não possui animais cadastrados.</p>
        @endif

        <a href="{{ route('app.rebanhos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
