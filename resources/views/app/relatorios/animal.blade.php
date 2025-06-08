<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Relatório do Animal</title>
</head>

<body>
    <h2>Relatório do Animal: {{ $animal->nome }}</h2>
    <ul>
        <li><strong>Raça:</strong> {{ $animal->raca->nome ?? '---' }}</li>
        <li><strong>Sexo:</strong> {{ $animal->sexo }}</li>
        <li><strong>Data de Nascimento:</strong> {{ $animal->data_nascimento }}</li>
        <li><strong>Peso:</strong> {{ $animal->peso }}</li>
        <li><strong>Proprietário:</strong> {{ $animal->proprietario->nome ?? '---' }}</li>
    </ul>
</body>

</html>
