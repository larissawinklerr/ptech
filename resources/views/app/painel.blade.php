@extends('site.layouts.app')

@section('title', 'Painel')

@section('content')
    <div class="container text-center mt-5">
        <h2 class="mb-4">
            <b>
                Olá, {{ Auth::user()->name }}
                </b> 👋</h2>
        <p class="mb-5">
            <b>
            Escolha uma funcionalidade:
           </b> 
        </p>

        <div class="row justify-content-center">

            <div class="col-md-3 col-6 mb-4">
                <a href="{{ route('app.animais.index') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0 hover-card">
                        <div class="card-body text-center">
                            <div style="font-size: 3rem;">🐄</div>
                            <h5 class="mt-2">Animais</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <a href="{{ route('app.procedimentos.index') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0 hover-card">
                        <div class="card-body text-center">
                            <div style="font-size: 3rem;">🧪</div>
                            <h5 class="mt-2">Procedimentos</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>

         <div class="row justify-content-center">
            <div class="col-md-3 col-6 mb-4">
                <a href="{{ route('app.rebanhos.index') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0 hover-card">
                        <div class="card-body text-center">
                            <div style="font-size: 3rem;">🐂</div>
                            <h5 class="mt-2">Rebanhos</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0 hover-card">
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

@push('styles')
    <style>
        .hover-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .hover-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }
    </style>
@endpush
