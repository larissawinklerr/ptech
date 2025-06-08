@extends('site.layouts.base')

@section('title', 'Página Inicial')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="w-100 p-5 bg-white rounded shadow" style="max-width: 900px;">
            <h1 class="fw-bold text-dark text-center mb-4">PTECH - Gestão Pecuária</h1>
            <p class="fs-5 text-secondary text-center mb-4">
                Gerencie seu rebanho de forma eficiente e organizada com nossa plataforma de gestão pecuária.
            </p>

            <ul class="list-unstyled fs-6 text-secondary" style="max-width: 750px; margin: 0 auto;">
                <li class="mb-3"><i class="fa-solid fa-globe text-success me-2"></i> Acesse de qualquer lugar, a qualquer
                    momento.</li>
                <li class="mb-3"><i class="fa-solid fa-microchip text-success me-2"></i> Transforme sua fazenda com
                    tecnologia!</li>
                <li class="mb-3"><i class="fa-solid fa-syringe text-success me-2"></i> Gerencie a vacinação do seu gado e
                    mantenha a saúde do rebanho em dia.</li>
                <li class="mb-3"><i class="fa-solid fa-notes-medical text-success me-2"></i> Registre nascimentos, manejos
                    e ocorrências com segurança.</li>
            </ul>
        </div>
    </div>
@endsection
