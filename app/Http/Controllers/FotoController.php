<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FotoController extends Controller
{
    public function analisaFoto($id)
    {
        $urlBase = "https://wave-labs.org/api/creature";
        $creatureContent = null;

        // Itera pelas páginas de 1 a 7
        for ($page = 1; $page <= 7; $page++) {
            try {
                $response = Http::get($urlBase, ['page' => $page]);

                // Verifica se a resposta foi bem-sucedida
                if ($response->successful()) {
                    $responseData = $response->json();

                    // Verifica se há dados e busca o conteúdo pelo ID
                    if (isset($responseData['data']) && is_array($responseData['data'])) {
                        $creature = collect($responseData['data'])->firstWhere('id', $id);
                        
                        if ($creature) {
                            $creatureContent = $creature;
                            Log::info('Creature content retrieved successfully', ['creature' => $creatureContent]);
                            break; // Encerra o loop ao encontrar o dado
                        }
                    } else {
                        Log::warning('Unexpected API response structure', ['response' => $responseData]);
                    }
                } else {
                    Log::error('API request failed', [
                        'status' => $response->status(),
                        'response' => $response->json() ?? 'No details',
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('API request threw an exception', ['message' => $e->getMessage()]);
            }
        }

        // Retorna a view com o conteúdo encontrado ou null
        return view('analisa-foto', ['creatureContent' => $creatureContent]);
    }
    public function aprovado(Request $request)
    {
       console.log($request);
       if($request){


       }else{
       }1
    }
}
