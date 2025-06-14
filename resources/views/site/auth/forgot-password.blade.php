@extends('site.layouts.base')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="p-5 bg-white rounded shadow" style="max-width: 500px; width: 100%;">
            <h2 class="text-center mb-4 text-dark">Recuperar Senha</h2>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h5 class="alert-heading">Por favor, corrija os seguintes erros:</h5>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-dark">E-mail</label>
                    <input type="email" name="email" id="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Digite seu e-mail"
                        value="{{ old('email') }}"
                        required>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Enviar Link de Recuperação</button>
                    <a href="{{ route('site.login') }}" class="btn btn-link text-decoration-none">Voltar para o Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection 