<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Animais</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .info-vazia {
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h2>📋 Relatório de Animais</h2>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Raça</th>
                <th>Sexo</th>
                <th>Data de Nascimento</th>
                <th>Peso (kg)</th>
            </tr>
        </thead>
        <tbody>
           @forelse($animais as $animal)
    <tr>
        <td>{{ $animal->nome }}</td>
        <td>{{ $animal->detalhes->raca ?? '---' }}</td>
        <td>{{ strtoupper($animal->sexo ?? '---') }}</td>
        <td>
            {{ $animal->detalhes->data_nascimento
                ? \Carbon\Carbon::parse($animal->detalhes->data_nascimento)->format('d/m/Y')
                : '---' }}
        </td>
        <td>{{ $animal->detalhes->peso_atual ?? '---' }}</td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="info-vazia">Nenhum animal encontrado para os critérios selecionados.</td>
    </tr>
@endforelse

        </tbody>
    </table>
</body>
</html>
