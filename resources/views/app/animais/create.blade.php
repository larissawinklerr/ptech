@extends('site.layouts.app')

@section('title', 'Cadastrar Novo Animal')

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

            <!-- NOME -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                    value="{{ old('nome') }}" placeholder="Nome do animal">
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- STATUS -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="">Selecione o status</option>
                    <option value="Ativo" {{ old('status') == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="Morto" {{ old('status') == 'Morto' ? 'selected' : '' }}>Morto</option>
                    <option value="Vendido" {{ old('status') == 'Vendido' ? 'selected' : '' }}>Vendido</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- SEXO -->
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" class="form-control @error('sexo') is-invalid @enderror">
                    <option value="">Selecione o sexo</option>
                    <option value="Macho" {{ old('sexo') == 'Macho' ? 'selected' : '' }}>Macho</option>
                    <option value="Fêmea" {{ old('sexo') == 'Fêmea' ? 'selected' : '' }}>Fêmea</option>
                </select>
                @error('sexo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- FERTILIDADE -->
            <div class="mb-3">
                <label for="fertilidade" class="form-label">Fertilidade</label>
                <select name="fertilidade" class="form-control @error('fertilidade') is-invalid @enderror">
                    <option value="">Selecione a fertilidade</option>
                    <option value="Fértil" {{ old('fertilidade') == 'Fértil' ? 'selected' : '' }}>Fértil</option>
                    <option value="Infértil" {{ old('fertilidade') == 'Infértil' ? 'selected' : '' }}>Infértil</option>
                    <option value="Castrado" {{ old('fertilidade') == 'Castrado' ? 'selected' : '' }}>Castrado</option>
                </select>
                @error('fertilidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- BRINCO/CHIP -->
            <div class="mb-3">
                <label for="brinco_chip" class="form-label">Brinco/Chip</label>
                <input type="text" name="brinco_chip" class="form-control @error('brinco_chip') is-invalid @enderror"
                    value="{{ old('brinco_chip') }}" placeholder="Identificador único">
                @error('brinco_chip')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- DATA NASCIMENTO -->
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento"
                    class="form-control @error('data_nascimento') is-invalid @enderror"
                    value="{{ old('data_nascimento') }}">
                @error('data_nascimento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- RAÇA -->
            <div class="mb-3">
                <label for="raca" class="form-label">Raça</label>
                <input type="text" name="raca" class="form-control @error('raca') is-invalid @enderror"
                    value="{{ old('raca') }}">
                @error('raca')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PESO NASCIMENTO -->
            <div class="mb-3">
                <label for="peso_nascimento" class="form-label">Peso ao nascer (kg)</label>
                <input type="number" step="0.01" name="peso_nascimento"
                    class="form-control @error('peso_nascimento') is-invalid @enderror"
                    value="{{ old('peso_nascimento') }}">
                @error('peso_nascimento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PESO ATUAL -->
            <div class="mb-3">
                <label for="peso_atual" class="form-label">Peso atual (kg)</label>
                <input type="number" step="0.01" name="peso_atual"
                    class="form-control @error('peso_atual') is-invalid @enderror" value="{{ old('peso_atual') }}">
                @error('peso_atual')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- REBANHO -->
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

            <!-- BOTÃO SALVAR -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
@endsection
