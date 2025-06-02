

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTECH - Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
        }

        .sidebar {
            width: 260px;
            background-color: #2e1e12;
            color: white;
            display: flex;
            flex-direction: column;
            height: 100vh;
            padding: 1rem;
        }

        .sidebar h2 {
            font-size: 28px;
            margin-bottom: 0;
        }

        .sidebar .user-info {
            margin: 1.5rem 0;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 0.75rem 0;
            font-weight: bold;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .main-content {
            flex: 1;
            background-color: #f4f4f4;
            padding: 1rem 2rem;
            overflow-y: auto;
        }

        .header {
            background-color: #fff;
            padding: 1rem 2rem;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .logout {
            font-weight: bold;
            color: #2e1e12;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>PTECH<br><small style="font-size: 16px;">2025</small></h2>

        <div class="user-info">
            <strong>{{ Auth::user()->name }}</strong>
        </div>

        <a href="{{ route('app.rebanhos.index') }}">REBANHO</a>
        <a href="{{ route('app.procedimentos.index') }}">PROCEDIMENTOS</a>
        <a href="{{ route('app.animais.index') }}">ANIMAIS</a>

        <div style="margin-top: auto;">
            <a href="{{ route('site.logout') }}">SAIR</a>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>@yield('titulo', 'PTECH')</h1>
            <a href="{{ route('site.logout') }}" class="logout">Sair</a>
        </div>

        <div class="content p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
