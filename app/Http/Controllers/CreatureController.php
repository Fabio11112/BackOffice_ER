<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CreatureController extends Controller
{
    public function showSubEspecies()
    {
        try {
            $response = Http::get('https://wave-labs.org/api/creature');
            $response2 = Http::get('https://wave-labs.org/api/creature-type');
            $response3 = Http::get('https://wave-labs.org/api/sighting');
    
            $creaturesType = $response2->successful() ? $response2->json() : [];
            $creaturesSubEspecies = $response->successful() ? $response->json() : [];
            $metadados = $response3->successful() ? $response3->json() : [];
    
            Log::info('API chamada com sucesso.');
            Log::info('Resposta da API creature:', [$response->json()]);
            Log::info('Resposta da API creature-type:', [$response2->json()]);
            Log::info('Resposta da API sighting:', [$response3->json()]);
    
            $allSightings = $metadados; // Começa com a resposta inicial do response3
    
            // Verifica se há uma próxima página
            while (isset($metadados['links']['next']) && $metadados['links']['next']) {
                $next = $metadados['links']['next'];
                Log::info('Proximo link :', ['next' => $next]);
    
                // Faz a requisição para a próxima página
                $response4 = Http::get($next);
                $metadados = $response4->successful() ? $response4->json() : [];
    
                // Mescla os dados da próxima página com os já obtidos
                if (isset($metadados['data'])) {
                    $allSightings['data'] = array_merge($allSightings['data'] ?? [], $metadados['data']);
                }
            }
    
            Log::info('Todos os avistamentos mesclados:', $allSightings);
    
            return view('avistamento', compact('creaturesType', 'creaturesSubEspecies', 'allSightings'));
    
        } catch (\Exception $e) {
            Log::error('Erro ao chamar a API: ' . $e->getMessage());
            return view('avistamento', [
                'creaturesSubEspecies' => [],
                'creaturesType' => [],
                'allSightings' => [],
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function updateForm(Request $request)
    {
        $especie = $request->input('especie');
        $subespecie = $request->input('subespecie');
        
        Log::info('Formulário submetido com sucesso.', [
            'especie' => $especie,
            'subespecie' => $subespecie,
        ]);

        return back()->with('success', 'Formulário enviado com sucesso!')
                     ->with('data', [
                         'especie' => $especie,
                         'subespecie' => $subespecie,
                         
                     ]);
    }
}
