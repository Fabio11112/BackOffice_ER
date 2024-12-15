<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avistamentos</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
  
</head>
<body>
    <div class="navbar">
        <a href="/">Home Page</a>
        <a href="#">Avistamentos Revisão</a>
    </div>
    <div class="content p-8" id="avistamentos-revisao">
        <h1 class="text-3xl font-bold mb-6">Avistamentos Revisão</h1>
        <div class="filter-section space-y-6">
            <h2 class="text-xl font-semibold mb-4">Filtros</h2>
            <form id="updateForm" method='post' action="{{ route('form.update') }}">
            <div class="space-y-4">
                <div>
                    <label for="especie" class="block text-sm font-medium text-gray-700">Espécie:</label>
                    <select id="especie" name="especie" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
    <option value="0">Selecione uma espécie</option>
    @if (!empty($creaturesType['data']))
        @foreach ($creaturesType['data'] as $creature)
                <option value="{{ $creature['taxa_category'] }}">{{ $creature['taxa_category'] }}</option>

        @endforeach
    @else
        <option value="">Nenhuma espécie encontrada</option>
    @endif
</select>
@php
    $creatures_subespecies = [];
@endphp
                   
                </div>
                <div>
                    <label for="subespecie" class="block text-sm font-medium text-gray-700">Subespécie:</label>
                    <select id="subespecie" name="subespecie" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="0">Selecione</option>
    @if (!empty($allSightings['data']))
    @foreach ($allSightings['data'] as $meta)
    @if (!in_array($meta['creature']['name'], $creatures_subespecies))
        <option value="{{ $meta['creature']['name']}}">
            {{ $meta['creature']['name'] }}
        </option>
        @php
            $creatures_subespecies[] = $meta['creature']['name'];
        @endphp
    @endif
@endforeach
    @else
        <option value="">Nenhuma especie encontrada</option>
    @endif
    </select>
                   
                </div>
                @php
    $beaufort_scale = [];
@endphp
                <div>
                <label for="vento" class="block text-sm font-medium text-gray-700">Estado do vento:</label>
<select id="vento" name="vento" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
    <option value="0">Selecione</option>
    @if (!empty($allSightings['data']))
    @foreach ($allSightings['data'] as $meta)
    @if (!in_array($meta['beaufort_scale']['id'], $beaufort_scale))
        <option value="{{ $meta['beaufort_scale']['desc']['pt']}}">
            {{ $meta['beaufort_scale']['desc']['pt'] }}
        </option>
        @php
            $beaufort_scale[] = $meta['beaufort_scale']['id'];
        @endphp
    @endif
@endforeach
    @else
        <option value="">Nenhuma escala encontrada</option>
    @endif
</select>

                </div>
                <div>
                    <label for="numero-especies" class="block text-sm font-medium text-gray-700">Número de espécies observadas:</label>
                    <input type="number" id="numero-especies" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="0"/>
                </div>
                <div>
                    <label for="bebes" class="block text-sm font-medium text-gray-700">Número de crias (bebés):</label>
                    <input type="number" id="bebes" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="0"/>
                </div>
                <div>
                @php
    $barcos = []; 
@endphp

<div>
    <label for="empresa-barco" class="block text-sm font-medium text-gray-700">
        Tipo de barco:
    </label>
    <select id="empresa-barco" name="empresa-barco" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        <option value="0">Selecione</option>
        @if (!empty($allSightings['data']))
            @foreach ($allSightings['data'] as $meta)
                @php
                    $currentBarco = $meta['vehicle']['vehicle'] ?? null; // Garantir que a chave exista
                @endphp
                @if ($currentBarco && !in_array($currentBarco['pt'], $barcos))
                    <option value="{{ $currentBarco['pt'] }}">
                        {{ $currentBarco['pt'] }}
                    </option>
                    @php
                        $barcos[] = $currentBarco['pt']; // Adicionar ao array de rastreamento
                    @endphp
                @endif
            @endforeach
        @else
            <option value="">Nenhum veículo encontrado</option>
        @endif
    </select>
</div>

                <div>
                @php
    $behaviours = []; // Array para rastrear comportamentos únicos
@endphp

<div>
    <label for="comportamento" class="block text-sm font-medium text-gray-700">
        Comportamento das espécies:
    </label>
    <select id="comportamento" name="comportamento" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        <option value="0">Selecione</option>
        @if (!empty($allSightings['data']))
            @foreach ($allSightings['data'] as $meta)
                @php
                    $currentBehaviour = $meta['behaviour']['behaviour'] ?? null; 
                @endphp
                @if ($currentBehaviour && !in_array($currentBehaviour['pt'], $behaviours))
                    <option value=" {{ $currentBehaviour['pt'] }}">
                        {{ $currentBehaviour['pt'] }}
                    </option>
                    @php
                        $behaviours[] = $currentBehaviour['pt']; // Adicionar ao array de rastreamento
                    @endphp
                @endif
            @endforeach
        @else
            <option value="">Nenhum comportamento encontrado</option>
        @endif
    </select>
</div>


                <div>
                    <label for="data-inicio" class="block text-sm font-medium text-gray-700">Data de Início:</label>
                    <input type="date" id="data-inicio" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
                </div>
                <div class="space-x-4">
                    <label for="hora-inicio" class="block text-sm font-medium text-gray-700">Hora de submissão (início):</label>
                    <input type="time" id="hora-inicio" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />

                    <label for="hora-fim" class="block text-sm font-medium text-gray-700">Hora de submissão (fim):</label>
                    <input type="time" id="hora-fim" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
                </div>
                <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Aplicar Filtros</button>
            </div>
        </div>
</form>
        <div class="results mt-8">
            <h2 class="text-xl font-semibold">Resultados</h2>
            <ul id="resultados" class="mt-4 bg-white p-4 shadow rounded-md">
                <li>Nenhum resultado encontrado.</li>
            </ul>
        </div>
    </div> 
         

</body>
</html>
