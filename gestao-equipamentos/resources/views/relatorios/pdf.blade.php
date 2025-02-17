<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Titulo: {{ $relatorio->titulo }}</h2>
    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($relatorio->data)->format('d/m/Y') }}</p>
    <p><strong>Descrição:</strong> {{ $relatorio->descricao }}</p>
    <p><strong>Vistoria:</strong> {{ $relatorio->vistoria->instituicao_id ?? 'N/A' }}</p>
</body>
</html>
