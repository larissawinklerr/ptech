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
                                <a href="{{ route('app.rebanhos.edit', $rebanho->id) }}"
                                    class="btn btn-primary btn-sm">Editar</a>

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalExcluir{{ $rebanho->id }}">
                                    Excluir
                                </button>

                                <div class="modal fade" id="modalExcluir{{ $rebanho->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel{{ $rebanho->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $rebanho->id }}">Confirmar
                                                    Exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Fechar"></button>
                                            </div>
                                            <div class="modal-body">
                                                Tem certeza que deseja excluir o rebanho
                                                <strong>{{ $rebanho->nome }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('app.rebanhos.destroy', $rebanho->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Sim, excluir</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
            overflow: hidden;
        }

        .table-hover tbody tr:hover {
            background-color: #f0f0f0;
        }

        .title-shadow {
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
            color: #1c1c1c;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8);
        }
    </style>
@endpush
