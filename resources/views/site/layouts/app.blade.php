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
        }

        .topo {
            background-color: #2e1b08;
            padding: 10px 40px;
        }

        .topo h1 {
            color: #fff;
            font-size: 24px;
        }

        .topo .menu a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
        }

        .topo .menu a:hover {
            color: #f17800;
        }

        .conteudo {
            padding: 100px 20px;
        }

        .card-custom {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="topo d-flex justify-content-between align-items-center">
        <h1>PTECH</h1>
        <div class="menu">
            <a href="{{ route('site.index') }}">Principal</a>
            <a href="{{ route('site.sobrenos') }}">Sobre Nós</a>
            <a href="{{ route('site.contato') }}">Contato</a>
        </div>
    </div>

    <div class="conteudo">
        @yield('content')
    </div>

</body>
</html>
