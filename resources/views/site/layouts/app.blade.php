@extends('site.layouts.base')

@section('content')
    <div class="container text-center">
        @auth
            <h2 class="mb-4">Olá, {{ Auth::user()->name }} 👋</h2>
        @endauth

        <p>Escolha uma funcionalidade:</p>

        <div class="row justify-content-center">
            <div class="col-md-3 col-6 mb-4">
                <a href="{{ route('app.animais.index') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <div style="font-size: 3rem;">🐄</div>
                            <h5 class="mt-2">Animais</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <a href="{{ route('app.procedimentos.index') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <div style="font-size: 3rem;">🧪</div>
                            <h5 class="mt-2">Procedimentos</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <div style="font-size: 3rem;">📊</div>
                            <h5 class="mt-2">Relatórios</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
