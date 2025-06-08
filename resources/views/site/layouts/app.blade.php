<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>@yield('title', 'PTECH - Sistema')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: url("{{ asset('img/bg.jpg') }}") no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        position: relative;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.0); 
        z-index: -1;
        filter: brightness(0.3);
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
        background-color: rgba(255, 255, 255, 0.9); /* mantém o contraste no conteúdo */
        min-height: 100vh;
        border-radius: 12px;
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new MutationObserver(() => {
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
            });

            observer.observe(document.body, { childList: true, subtree: true });
        });
    </script>
</body>
</html>
