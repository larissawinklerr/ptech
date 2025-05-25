@extends('site.layouts.base')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Cadastrar Novo Animal</h2>

    <form action="{{ route('app.animais.store') }}" method="POST">
        @csrf

        {{-- Tabela: animais --}}
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome do animal" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" name="status" class="form-control" placeholder="Ex: Ativo, Vendido, etc.">
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <input type="text" name="sexo" class="form-control" placeholder="M ou F">
        </div>

        <div class="mb-3">
            <label for="fertilidade" class="form-label">Fertilidade</label>
            <input type="text" name="fertilidade" class="form-control">
        </div>

        <hr>

        {{-- Tabela: animal_detalhes --}}
        <div class="mb-3">
            <label for="brinco_chip" class="form-label">Brinco/Chip</label>
            <input type="text" name="brinco_chip" class="form-control" placeholder="Identificador">
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control">
        </div>

        <div class="mb-3">
            <label for="raca" class="form-label">Raça</label>
            <input type="text" name="raca" class="form-control">
        </div>

        <div class="mb-3">
            <label for="peso_nascimento" class="form-label">Peso ao nascer (kg)</label>
            <input type="number" name="peso_nascimento" class="form-control" step="0.01">
        </div>

        <div class="mb-3">
            <label for="peso_atual" class="form-label">Peso atual (kg)</label>
            <input type="number" name="peso_atual" class="form-control" step="0.01">
        </div>

        <div class="mb-3">
            <label for="rebanho_id" class="form-label">Rebanho</label>
            <select name="rebanho_id" class="form-control" required>
            <option value="">Selecione um rebanho</option>
        @foreach($rebanhos as $rebanho)
            <option value="{{ $rebanho->id }}">{{ $rebanho->nome }}</option>
        @endforeach
            </select>
        </div>


        <div class="d-grid">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>
@endsection
