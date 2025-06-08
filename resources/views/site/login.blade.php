@extends('site.layouts.base')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="p-5 bg-white rounded shadow" style="max-width: 500px; width: 100%;">
        <h2 class="text-center mb-4 text-dark">Login no Sistema</h2>

        <form action="{{ route('site.login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label text-dark">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label text-dark">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha">
                @if($errors->has('senha'))
                    <div class="text-danger">{{ $errors->first('senha') }}</div>
                @endif
            </div>

            @if(isset($erro) && $erro != '')
                <div class="alert alert-danger">{{ $erro }}</div>
            @endif

            <div class="d-grid">
                <button type="submit" class="btn btn-success">Acessar</button>
            </div>
        </form>
    </div>
</div>
@endsection

