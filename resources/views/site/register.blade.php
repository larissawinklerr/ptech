@extends('site.layouts.base')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="p-5 bg-white rounded shadow" style="max-width: 500px; width: 100%;">
            <h2 class="text-center mb-4 text-dark">Cadastro</h2>

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

            <form method="POST" action="{{ route('site.register.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label text-dark">Nome</label>
                    <input type="text" name="name" id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Digite seu nome" 
                        value="{{ old('name') }}" 
                        required>
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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

                <div class="mb-3">
                    <label for="senha" class="form-label text-dark">Senha</label>
                    <input type="password" name="senha" id="senha" 
                        class="form-control @error('senha') is-invalid @enderror" 
                        placeholder="Digite sua senha" 
                        required>
                    @error('senha')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="confirmarSenha" class="form-label text-dark">Confirmar Senha</label>
                    <input type="password" name="confirmarSenha" id="confirmarSenha" 
                        class="form-control @error('confirmarSenha') is-invalid @enderror" 
                        placeholder="Confirme sua senha" 
                        required>
                    @error('confirmarSenha')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
