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
    <p><strong>Categoria:</strong> {{ $creatureContent['type']['taxa_category'] ?? 'N/A' }}</p>
    <p><strong>Nome:</strong> {{ $creatureContent['name'] ?? 'N/A' }}</p>
    <p><strong>Descrição:</strong> {{ $creatureContent['description'] ?? 'N/A' }}</p>

    <p><strong>Foto:</strong></p>
    @if(isset($creatureContent['photos']) && is_array($creatureContent['photos']))
        @foreach($creatureContent['photos'] as $photo)
            <div>
                <img src="https://wave-labs.org/api/{{ $photo['link'] }}" alt="Foto da Criatura" style="max-width: 300px;">
            </div>
        @endforeach
    @else
        <p>Foto não disponível</p>
    @endif

    <div class="buttons-container">
        <button onclick="aceitar()">Aceitar</button>
        <button onclick="naoAceitar()">Não Aceitar</button>
    </div>
</body>
</html>
