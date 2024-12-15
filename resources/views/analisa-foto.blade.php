<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Criatura</title>
    @vite('resources/css/analisa-foto.css')
    @vite('resources/js/analisa-foto.js')
</head>
<body>
    <h1>Detalhes da Criatura</h1>
    <p><strong>Nome:</strong> {{ $creature['name'] ?? 'N/A' }}</p>
    <p><strong>Descrição:</strong> {{ $creature['description'] ?? 'N/A' }}</p>
    <p><strong>Foto:</strong></p>
    @if(isset($creature['photo_url']))
        <img src="{{ $creature['photo_url'] }}" alt="Foto da Criatura">
    @else
        <p>Foto não disponível</p>
    @endif

    <div class="buttons-container">
        <button onclick="aceitar()">Aceitar</button>
        <button onclick="naoAceitar()">Não Aceitar</button>
    </div>
</body>
</html>
