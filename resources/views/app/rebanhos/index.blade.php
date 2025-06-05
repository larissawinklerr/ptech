@extends('site.layouts.app')

@section('title', 'Rebanhos')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold text-uppercase mb-4 title-shadow">REBANHOS</h1>

    <div class="card p-4 shadow rounded-4 bg-light bg-opacity-75">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('app.rebanhos.create') }}" class="btn btn-success">+ Novo Rebanho</a>
        </div>

        <table class="table table-hover table-bordered rounded-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rebanhos as $rebanho)
                    <tr>
                        <td>{{ $rebanho->nome }}</td>
                        <td class="text-center">
                            <a href="{{ route('app.rebanhos.show', $rebanho->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('app.rebanhos.edit', $rebanho->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('app.rebanhos.destroy', $rebanho->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este rebanho?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<style>
    .rounded-table {
        border-radius: 12px;
        overflow: hidden;
    }

    .table-hover tbody tr:hover {
        background-color: #f0f0f0;
    }

    .title-shadow {
        text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
        color: #1c1c1c;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.8);
    }
</style>
@endpush