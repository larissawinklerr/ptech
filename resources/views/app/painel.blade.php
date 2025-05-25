@extends('site.layouts.base')


@section('title', 'Painel')

@section('content')
    <h2>Olá, {{ Auth::user()->name }} 👋</h2>
    <p>Escolha uma funcionalidade:</p>

    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('app.animais.index') }}">🐄 Animais</a></li>
        <li class="list-group-item"><a href="#">🧪 Procedimentos</a></li>
        <li class="list-group-item"><a href="#">📊 Relatórios</a></li>
    </ul>
@endsection
