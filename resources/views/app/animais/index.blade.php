@extends('site.layouts.app')


@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Animais</h2>

    <table class="table table-bordered table-light">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Brinco/Chip</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animais as $animal)
                <tr>
                    <td>{{ $animal->detalhes->nome ?? '-' }}</td>
                    <td>{{ $animal->detalhes->brinco_chip ?? '-' }}</td>
                    <td>
                        <a href="{{ route('app.animal_detalhes.show', $animal->id) }}" class="btn btn-sm btn-info">Ver Detalhes</a>
                        <a href="{{ route('app.animais.edit', $animal->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('app.animais.destroy', $animal->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('app.animais.create') }}" class="btn btn-success">Adicionar Novo Animal</a>
</div>
@endsection
