<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Animais</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 30px;
            color: #333;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header img {
            height: 70px;
            display: block;
            margin: 0 auto 10px;
        }

        h2 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #555;
            padding: 6px 10px;
            text-align: center;
        }

        th {
            background-color: #e9e9e9;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        .no-data {
            text-align: center;
            color: #777;
            font-style: italic;
            padding: 20px;
        }
    </style>
</head>

<body>

    <header>
        <img src="{{ public_path('img/logo.png') }}" alt="Logo PTECH">
        <h2>Relatório de Animais</h2>
    </header>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Raça</th>
                <th>Sexo</th>
                <th>Data de Nascimento</th>
                <th>Peso Atual (kg)</th>
                <th>Rebanho</th>
            </tr>
        </thead>
        <tbody>
            @forelse($animais as $animal)
                <tr>
                    <td>{{ $animal->detalhes->nome ?? '---' }}</td>
                    <td>{{ $animal->detalhes->raca ?? '---' }}</td>
                    <td>{{ strtoupper($animal->sexo ?? '---') }}</td>
                    <td>
                        {{ $animal->detalhes->data_nascimento
                            ? \Carbon\Carbon::parse($animal->detalhes->data_nascimento)->format('d/m/Y')
                            : '---' }}
                    </td>
                    <td>{{ $animal->detalhes->peso_atual ?? '---' }}</td>
                    <td>{{ $animal->detalhes->rebanho->nome ?? '---' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="no-data">Nenhum animal encontrado para os filtros selecionados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
