<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FotoController extends Controller
{
    public function analisaFoto($id)
    {
        Log::info("Entered analisaFoto method with ID: {$id}");
        $creatureContent = null;

        try {
            $response = Http::get("https://wave-labs.org/api/creature", ['id' => $id]);

            if ($response->successful()) {
                $responseData = $response->json();

                // Verifica se há dados e busca o conteúdo correspondente ao `id`
                if (isset($responseData['data']) && is_array($responseData['data'])) {
                    $creature = collect($responseData['data'])->firstWhere('id', $id);
                    if ($creature) {
                        $creatureContent = $creature;
                        Log::info('Creature content retrieved successfully', ['creature' => $creatureContent]);
                    } else {
                        Log::warning('Creature not found for the given ID', ['id' => $id, 'response' => $responseData]);
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

        return view('analisa-foto', ['creatureContent' => $creatureContent]);
    }

}
