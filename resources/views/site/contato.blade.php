@extends('site.layouts.base')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-white mb-4">Entre em contato conosco</h2>

    <form action="{{ route('site.contato') }}" method="post">
        @csrf

        <div class="mb-3">
            <input type="text" name="nome" class="form-control" placeholder="Nome" required>
        </div>

        <div class="mb-3">
            <input type="text" name="telefone" class="form-control" placeholder="Telefone">
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
        </div>

        <div class="mb-3">
            <select name="motivo_contato" class="form-select" required>
                <option value="">Qual o motivo do contato?</option>
                <option value="dúvida">Dúvida</option>
                <option value="elogio">Elogio</option>
                <option value="reclamação">Reclamação</option>
            </select>
        </div>

        <div class="mb-3">
            <textarea name="mensagem" rows="4" class="form-control" placeholder="Preencha aqui a sua mensagem" required></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success w-100">ENVIAR</button>
        </div>
    </form>
</div>
@endsection
