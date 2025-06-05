<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PTECH - Sistema')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('img/bg.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            background-color: #2c1c0f;
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            font-weight: bold;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .main-content {
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            min-height: 100vh;
        }
        .logo {
            width: 90px;
            margin-bottom: 15px;
            cursor: pointer;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <div class="sidebar d-flex flex-column align-items-start">
            <a href="{{ route('app.painel') }}">
                <img src="{{ asset('img/logo-ptech.png') }}" class="logo" alt="Logo">
            </a>
            <h4 class="mt-2">PTECH</h4>
            <small>2025</small>
            <div class="mt-2 mb-4">
                <strong>{{ Auth::user()->name ?? 'Usuário' }}</strong>
            </div>
            <a href="{{ route('app.animais.index') }}">ANIMAIS</a>
            <a href="{{ route('app.procedimentos.index') }}">PROCEDIMENTOS</a>
            <a href="{{ route('app.rebanhos.index') }}">REBANHO</a>
            
            <div class="mt-auto">
                <a href="{{ route('site.logout') }}">SAIR</a>
            </div>
        </div>
        <div class="flex-grow-1 main-content">
            @yield('content')
        </div>
    </div>
</body>
</html>