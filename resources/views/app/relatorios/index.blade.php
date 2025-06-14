@extends('site.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>📊 Relatórios de Animais</h2>
        <p>Escolha o tipo de relatório que deseja gerar:</p>

        <form action="{{ route('relatorio.animais.filtrado') }}" method="GET" class="mb-4">
            <!-- FILTRAR POR REBANHO -->
            <div class="mb-2">
                <label for="rebanho_id">Filtrar por Rebanho:</label>
                <select name="rebanho_id" id="rebanho_id" class="form-select">
                    <option value="">-- Todos --</option>
                    @foreach ($rebanhos as $rebanho)
                        <option value="{{ $rebanho->id }}">{{ $rebanho->nome }}</option>
                    @endforeach
                </select>
            </div>

            <!-- FILTRAR POR NOME -->
            <div class="mb-2">
                <label for="nome">Filtrar por Nome:</label>
                <select name="nome" id="nome" class="form-select">
                    <option value="">-- Todos --</option>
                    @foreach ($animais as $animal)
                        <option value="{{ $animal->detalhes->nome }}">
                            {{ $animal->detalhes->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- BOTÃO -->
            <button type="submit" class="btn btn-primary">Gerar Relatório Filtrado</button>
        </form>
    </div>
@endsection
