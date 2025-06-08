@php use Illuminate\Support\Facades\Auth; @endphp

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo ?? 'PTECH - Sistema' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

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
            background-color: rgba(77, 37, 1, 0.8);
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #39d305;
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

        .botao-destaque {
    background-color: #c69038;
    color: #fff !important;
    padding: 6px 16px;
    border-radius: 20px;
    margin-left: 20px;
    transition: background 0.3s;
}
.botao-destaque:hover {
    background-color: #a8742c;
    color: #fff;
}


        .conteudo {
            padding: 50px 20px;
        }

        .content-card {
            max-width: 500px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.95);
            color: #333;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

    </style>
</head>
<body>
    <div class="topo">
        <h1>PTECH</h1>
        <div class="menu">
            @php
                $isApp = request()->is('app') || request()->is('app/*');
                $isHome = request()->routeIs('site.index');
            @endphp

            @if (!$isApp)
                <a href="{{ route('site.index') }}">Principal</a>
                <a href="{{ route('site.sobrenos') }}">Sobre Nós</a>

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

    @if($isHome)
        <div class="fundo-home">
    @endif

        <div class="conteudo">
            @yield('content')
        </div>

    @if($isHome)
        </div>
    @endif

</body>
</html>
