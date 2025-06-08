@extends('site.layouts.base')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="p-5 bg-white rounded shadow" style="max-width: 500px; width: 100%;">
        <h2 class="text-center mb-4 text-dark">Cadastro</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('site.register.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label text-dark">Nome</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-dark">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label text-dark">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
@endsection

