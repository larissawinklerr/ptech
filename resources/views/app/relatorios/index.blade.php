@extends('site.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>📊 Relatórios de Animais</h2>
        <p>Escolha o tipo de relatório que deseja gerar:</p>

        <div class="mb-4">
            <a href="{{ route('relatorio.animais') }}" class="btn btn-success">📋 Todos os Animais</a>
        </div>

        <form action="{{ route('relatorio.animais.filtrado') }}" method="GET" class="mb-4">
            <div class="mb-2">
                <label for="rebanho_id">Filtrar por Rebanho:</label>
                <select name="rebanho_id" id="rebanho_id" class="form-select">
                    <option value="">-- Todos --</option>
                    @foreach ($rebanhos as $rebanho)
                        <option value="{{ $rebanho->id }}">{{ $rebanho->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label for="nome">Buscar por Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control"
                    placeholder="Digite o nome do animal">
            </div>

            <button type="submit" class="btn btn-primary">Gerar Relatório Filtrado</button>
        </form>
    </div>
@endsection
