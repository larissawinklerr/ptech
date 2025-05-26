<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PTECH - Sistema')</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-right: 15px;
        }

        .logo span {
            color: #fff;
        }


        .conteudo {
            padding: 50px 20px;
        }
    </style>
</head>
<body>

    <div class="topo">
        <div class="logo">
            <img src="{{ asset('img/logo-ptech.png') }}" alt="Logo PTECH" style="height: 50px;">
            <span class="ms-2 fw-bold text-white">PTECH 2025</span>
        </div>

        <div>
            <a href="{{ route('site.logout') }}" class="btn btn-outline-light btn-sm">Sair</a>
        </div>
    </div>

    <div class="conteudo">
        @yield('content')
    </div>

</body>
</html>
