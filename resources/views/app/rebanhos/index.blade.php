@extends('site.layouts.base')

@section('content')
<div class="container mt-5">
    <h2>Lista de Rebanhos</h2>

    <a href="{{ route('app.rebanhos.create') }}" class="btn btn-success mb-3">Novo Rebanho</a>

    <table class="table table-bordered table-light">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rebanhos as $rebanho)
                <tr>
                    <td>
                        <a href="{{ route('app.rebanhos.show', $rebanho->id) }}">
                            {{ $rebanho->nome }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('app.rebanhos.show', $rebanho->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('app.rebanhos.edit', $rebanho->id) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('app.rebanhos.destroy', $rebanho->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
