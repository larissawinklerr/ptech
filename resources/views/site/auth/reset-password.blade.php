@extends('site.layouts.base')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="p-5 bg-white rounded shadow" style="max-width: 500px; width: 100%;">
            <h2 class="text-center mb-4 text-dark">Redefinir Senha</h2>

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

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label text-dark">E-mail</label>
                    <input type="email" name="email" id="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Digite seu e-mail"
                        value="{{ $email ?? old('email') }}"
                        required>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-dark">Nova Senha</label>
                    <input type="password" name="password" id="password" 
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Digite sua nova senha"
                        required>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label text-dark">Confirmar Nova Senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="form-control"
                        placeholder="Confirme sua nova senha"
                        required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Redefinir Senha</button>
                    <a href="{{ route('site.login') }}" class="btn btn-link text-decoration-none">Voltar para o Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection 