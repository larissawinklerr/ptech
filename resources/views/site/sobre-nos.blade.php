@extends('site.layouts.base')

@section('title', 'Sobre Nós')

@section('content')
    <div class="container my-5">
        <h1 class="text-center fw-bold mb-4">Sobre a PTECH</h1>
        <p class="text-center mb-5 fs-5">Facilitamos a vida do pecuarista com tecnologia, praticidade e inovação.</p>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <i class="fa-solid fa-cow fa-3x mb-3 text-success"></i>
                <h5 class="fw-bold">Gestão de Rebanhos</h5>
                <p>Organize, acompanhe e monitore seus animais de forma digital e acessível.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fa-solid fa-laptop fa-3x mb-3 text-primary"></i>
                <h5 class="fw-bold">Tecnologia no Campo</h5>
                <p>Levamos a modernização até você, com ferramentas intuitivas e práticas.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fa-solid fa-chart-line fa-3x mb-3 text-danger"></i>
                <h5 class="fw-bold">Produtividade</h5>
                <p>Transforme dados em decisões inteligentes e aumente a eficiência da sua produção.</p>
            </div>
        </div>
    </div>
@endsection
