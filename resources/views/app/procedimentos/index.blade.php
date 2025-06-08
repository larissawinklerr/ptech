@extends('site.layouts.app')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Procedimentos</h2>
            <a href="{{ route('app.procedimentos.create') }}" class="btn btn-success">+ Novo Procedimento</a>
        </div>

        @foreach ($procedimentos as $procedimento)
            <div class="card shadow-sm p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="fw-bold mb-1">{{ $procedimento->nome_procedimento }} ({{ $procedimento->tipo }})</p>

                        @if ($procedimento->animal)
                            <p class="mb-1">
                                Animal:
                                <span class="text-body fw-normal">
                                    {{ $procedimento->animal->detalhes->nome ?? 'Sem nome' }}
                                </span>
                            </p>
                        @elseif ($procedimento->rebanho)
                            <p class="mb-1">
                                Rebanho:
                                <span class="text-body fw-normal">
                                    {{ $procedimento->rebanho->nome }}
                                </span>
                            </p>
                        @endif

                        <p class="mb-0">{{ \Carbon\Carbon::parse($procedimento->data)->format('d/m/Y') }}</p>
                    </div>

                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#modalExcluir{{ $procedimento->id }}">
                        Excluir
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalExcluir{{ $procedimento->id }}" tabindex="-1"
                        aria-labelledby="modalLabel{{ $procedimento->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $procedimento->id }}">Confirmar Exclusão</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja excluir o procedimento
                                    <strong>{{ $procedimento->nome_procedimento }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('app.procedimentos.destroy', $procedimento->id) }}"
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

                </div>
            </div>
        @endforeach
    </div>
@endsection
