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
            <div class="space-y-4">
                <div>
                    <label for="especie" class="block text-sm font-medium text-gray-700">Espécie:</label>
                    <select id="especie" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <option value="">Selecione uma espécie</option>
                        <option value="golfinho">Golfinho</option>
                        <option value="baleia">Baleia</option>
                    </select>
                </div>
                <div>
                    <label for="subespecie" class="block text-sm font-medium text-gray-700">Subespécie:</label>
                    <select id="subespecie" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <option value="">Selecione uma subespécie</option>
                        <option value="golfinho-comum">Golfinho Comum</option>
                        <option value="baleia-azul">Baleia Azul</option>
                    </select>
                </div>

                <div>
                    <label for="vento" class="block text-sm font-medium text-gray-700">Estado do vento:</label>
                    <select id="vento" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <option value="">Selecione</option>
                        <option value="calmo">Calmo</option>
                        <option value="moderado">Moderado</option>
                        <option value="forte">Forte</option>
                    </select>
                </div>
                <div>
                    <label for="numero-especies" class="block text-sm font-medium text-gray-700">Número de espécies observadas:</label>
                    <input type="number" id="numero-especies" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
                </div>
                <div>
                    <label for="bebes" class="block text-sm font-medium text-gray-700">Número de crias (bebés):</label>
                    <input type="number" id="bebes" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
                </div>
                <div>
                    <label for="data-hora" class="block text-sm font-medium text-gray-700">Data e hora do avistamento:</label>
                    <input type="datetime-local" id="data-hora" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
                </div>
                <div>
                    <label for="empresa-barco" class="block text-sm font-medium text-gray-700">Empresa de barcos utilizada:</label>
                    <input type="text" id="empresa-barco" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
                </div>
                <div>
                    <label for="comportamento" class="block text-sm font-medium text-gray-700">Comportamento das espécies:</label>
                    <input type="text" id="comportamento" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
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
                <button onclick="filtrarResultados()" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Aplicar Filtros</button>
            </div>
        </div>
        <div class="results mt-8">
            <h2 class="text-xl font-semibold">Resultados</h2>
            <ul id="resultados">
                <li>Nenhum resultado encontrado.</li>
            </ul>
        </div>
    </div>
</body>
</html>
