@extends('site.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center fw-bold text-uppercase mb-4 title-shadow">ANIMAIS</h1>

        <div class="card p-4 shadow rounded-4 bg-light bg-opacity-75">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('app.animais.create') }}" class="btn btn-success">+ Adicionar Novo Animal</a>
            </div>

            <table class="table table-hover table-bordered rounded-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Brinco/Chip</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($animais as $animal)
                        <tr>
                            <td>{{ $animal->detalhes->nome ?? '-' }}</td>
                            <td>{{ $animal->detalhes->brinco_chip ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('app.animal_detalhes.show', $animal->id) }}"
                                    class="btn btn-info btn-sm">Ver Detalhes</a>
                                <a href="{{ route('app.animais.edit', $animal->id) }}"
                                    class="btn btn-primary btn-sm">Editar</a>

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalExcluir{{ $animal->id }}">
                                    Excluir
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalExcluir{{ $animal->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel{{ $animal->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $animal->id }}">Confirmar
                                                    Exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Fechar"></button>
                                            </div>
                                            <div class="modal-body">
                                                Tem certeza que deseja excluir o animal
                                                <strong>{{ $animal->detalhes->nome ?? '-' }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('app.animais.destroy', $animal->id) }}"
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
            border-radius: 12px;
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-confirm-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    const confirmed = confirm('Tem certeza que deseja excluir este animal?');
                    if (!confirmed) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
@endpush
