@extends('site.layouts.app')

@section('content')
    <div class="container">
        <h2>Novo Procedimento</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="PUT" action="{{ route('app.procedimentos.store') }}">
            @csrf

            <div class="mb-3">
                <label for="aplicacao" class="form-label">Aplicação</label>
                <select name="aplicacao" id="aplicacao" class="form-select" required onchange="toggleAnimalSelect()">
                    <option value="">Selecione a aplicação</option>
                    <option value="Por animal">Por animal</option>
                    <option value="Por lote">Por lote</option>
                </select>
            </div>

            <div class="mb-3" id="animalSelect" style="display: none;">
                <label for="animal_id" class="form-label">Animal</label>
                <select name="animal_id" id="animal_id" class="form-select">
                    <option value="">Selecione o animal</option>
                    @foreach ($animais as $animal)
                        <option value="{{ $animal->id }}">
                            {{ $animal->nome }} - Brinco: {{ $animal->detalhes->brinco_chip ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>

            <div class="mb-3">
                <label for="nome_procedimento" class="form-label">Nome do procedimento/produto</label>
                <input type="text" class="form-control" id="nome_procedimento" name="nome_procedimento" required>
            </div>

            <div class="mb-3">
                <label for="observacoes" class="form-label">Observações</label>
                <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>

    <script>
        function toggleAnimalSelect() {
            const aplicacao = document.getElementById('aplicacao').value;
            const animalSelect = document.getElementById('animalSelect');

            if (aplicacao === 'Por animal') {
                animalSelect.style.display = 'block';
            } else {
                animalSelect.style.display = 'none';
                document.getElementById('animal_id').value = '';
            }
        }
    </script>
@endsection
