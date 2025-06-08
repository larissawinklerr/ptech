@extends('site.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Cadastrar Novo Animal</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erros encontrados:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('app.animais.store') }}" method="POST">
            @csrf

            {{-- Tabela: animais --}}
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                    value="{{ old('nome') }}" placeholder="Nome do animal">
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" class="form-control @error('status') is-invalid @enderror"
                    value="{{ old('status') }}" placeholder="Ex: Ativo, Vendido, etc.">
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <input type="text" name="sexo" class="form-control @error('sexo') is-invalid @enderror"
                    value="{{ old('sexo') }}" placeholder="M ou F">
                @error('sexo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fertilidade" class="form-label">Fertilidade</label>
                <input type="text" name="fertilidade" class="form-control @error('fertilidade') is-invalid @enderror"
                    value="{{ old('fertilidade') }}">
                @error('fertilidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            {{-- Tabela: animal_detalhes --}}
            <div class="mb-3">
                <label for="brinco_chip" class="form-label">Brinco/Chip</label>
                <input type="text" name="brinco_chip" class="form-control @error('brinco_chip') is-invalid @enderror"
                    value="{{ old('brinco_chip') }}" placeholder="Identificador único">
                @error('brinco_chip')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento"
                    class="form-control @error('data_nascimento') is-invalid @enderror"
                    value="{{ old('data_nascimento') }}">
                @error('data_nascimento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="raca" class="form-label">Raça</label>
                <input type="text" name="raca" class="form-control @error('raca') is-invalid @enderror"
                    value="{{ old('raca') }}">
                @error('raca')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="peso_nascimento" class="form-label">Peso ao nascer (kg)</label>
                <input type="number" step="0.01" name="peso_nascimento"
                    class="form-control @error('peso_nascimento') is-invalid @enderror"
                    value="{{ old('peso_nascimento') }}">
                @error('peso_nascimento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="peso_atual" class="form-label">Peso atual (kg)</label>
                <input type="number" step="0.01" name="peso_atual"
                    class="form-control @error('peso_atual') is-invalid @enderror" value="{{ old('peso_atual') }}">
                @error('peso_atual')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rebanho_id" class="form-label">Rebanho</label>
                <select name="rebanho_id" class="form-control @error('rebanho_id') is-invalid @enderror">
                    <option value="">Selecione um rebanho</option>
                    @foreach ($rebanhos as $rebanho)
                        <option value="{{ $rebanho->id }}" {{ old('rebanho_id') == $rebanho->id ? 'selected' : '' }}>
                            {{ $rebanho->nome }}
                        </option>
                    @endforeach
                </select>
                @error('rebanho_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
@endsection
