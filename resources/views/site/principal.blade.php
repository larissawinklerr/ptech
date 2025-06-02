@extends('site.layouts.base')


@section('content')
    <div class="container mt-5">
        <h1 class="text-white">PTECH - Gestão Pecuária</h1>
        <p class="text-white">Gerencie seu rebanho de forma eficiente e organizada com nossa plataforma de gestão pecuária.</p>

        <div class="mt-4">
            <div class="mb-2">
                <img src="{{ asset('img/check.png') }}" style="width: 24px;" alt="Check">
                <span class="text-white">Acesse de qualquer lugar, a qualquer momento.</span>
            </div>
            <div class="mb-2">
                <img src="{{ asset('img/check.png') }}" style="width: 24px;" alt="Check">
                <span class="text-white">Transforme sua fazenda com tecnologia!</span>
            </div>
            <div class="mb-2">
                <img src="{{ asset('img/check.png') }}" style="width: 24px;" alt="Check">
                <span class="text-white">Gerencie a vacinação do seu gado e mantenha a saúde do rebanho em dia.</span>
            </div>
            <div class="mb-2">
                <img src="{{ asset('img/check.png') }}" style="width: 24px;" alt="Check">
                <span class="text-white">Registre nascimentos, manejos e ocorrências de forma organizada e segura.</span>
            </div>
        </div>

        <div class="text-center mt-5">
            <img src="{{ asset('img/inicial.png') }}" alt="Banner" class="img-fluid rounded shadow" style="max-width: 700px;">
        </div>
    </div>
@endsection
