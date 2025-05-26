@extends('site.layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Procedimentos</h2>
        <a href="{{ route('app.procedimentos.create') }}" class="btn btn-success">+ Novo Procedimento</a>
    </div>

    @if($procedimentos->count())
        <ul class="list-group">
            @foreach($procedimentos as $proc)
                <li class="list-group-item">
                    <strong>{{ $proc->nome }}</strong> - {{ $proc->tipo }} ({{ $proc->aplicacao }})<br>
                    Animal: {{ $proc->animal->id }}<br>
                    {{ $proc->observacoes }}<br>
                    <small>{{ \Carbon\Carbon::parse($proc->data)->format('d/m/Y') }}</small>

                    <form method="POST" action="{{ route('app.procedimentos.destroy', $proc->id) }}" class="d-inline float-end">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja deletar este procedimento?')">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhum procedimento encontrado.</p>
    @endif
</div>
@endsection
