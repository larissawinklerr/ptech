@php use Illuminate\Support\Facades\Auth; @endphp

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo ?? 'PTECH - Sistema' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('img/fundoprincipal.png') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Roboto', sans-serif;
            color: #fff;
            min-height: 100vh;
            margin: 0;
        }

        .topo {
            background-color: rgba(0, 0, 0, 0.4);
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topo h1 {
            margin: 0;
            font-size: 24px;
            color: #fff;
        }

        .menu a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .menu a:hover {
            color: #f17800;
        }

        .conteudo {
            padding: 50px 20px;
        }
    </style>
</head>
<body>

    <div class="topo">
        <h1>PTECH</h1>
        <div class="menu">
            @php
                $isApp = request()->is('app') || request()->is('app/*');
            @endphp

            @if (!$isApp)
                <a href="{{ route('site.index') }}">Principal</a>
                <a href="{{ route('site.sobrenos') }}">Sobre Nós</a>
                <a href="{{ route('site.contato') }}">Contato</a>

                @guest
                    <a href="{{ route('site.login') }}">Login</a>
                    <a href="{{ route('site.register') }}">Cadastro</a>
                @endguest
            @endif

            @auth
                @if ($isApp)
                    <a href="{{ route('site.logout') }}">Sair</a>
                @endif
            @endauth
        </div>
    </div>

    <div class="conteudo">
        @yield('content')
    </div>

</body>
</html>
