<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metadado; // Model vinculada à tabela `images`
use Illuminate\Support\Facades\Log;

class MetadadoController extends Controller 
{
    public function uploadMetadado(Request $request)
    {
        try{
            Log::info('Request data: ' . json_encode($request->all()));


            $metadata = $request->validate([
                'utilizador_id' => 'required|integer',
                'qnt_avistamentos' => 'integer',
                'latitude' => 'nullable|decimal',
                'longitude' => 'nullable|decimal',
                'num_crias' => 'integer',
                'empresa_barcos' => 'string',
                'comportamento_especies' => 'string',
                "beaufourt_scale" => 'integer',
                "data_hora_avistamento"=>'string'
                ]);
                $utilizador_id = $metadata['utilizador_id'];
                $qnt_avistamentos = $metadata['qnt_avistamentos'];
                $latitude = $metadata['latitude'] ?? null;
                $longitude = $metadata['longitude'] ?? null;
                $num_crias =$metadata['num_crias'];

                $empresa_barcos = $metadata['empresa_barcos'];
                $comportamento_especies = $metadata['comportamento_especies'];
                $beaufourt_scale = $metadata['beaufourt_scale'];
                $data_hora_avistamento = $metadata['data_hora_avistamento'];

            
                $metadado = Metadado::create([
                    'utilizador_id' => $utilizador_id  , 
                    'qnt_avistamentos' => $qnt_avistamentos, 
                    'latitude' => $latitude ,
                    'longitude' => $longitude ,
                    'num_crias' => $num_crias,
                    'data_hora_avistamento' =>  $data_hora_avistamento,
                    'empresa_barcos' => $empresa_barcos ,
                    'comportamento_especies' => $comportamento_especies ,
                    'beaufourt_scale' => $beaufourt_scale ,
                ]);
                    
                return response()->json([
                    'message' => 'Metadata uploaded successfully',
                    'status' => 200,
                    'id_metadado' => $metadado->getKey()
                ], 200);
     
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Error uploading Metadata: ' . $e->getMessage(),
                'status' => 500
            ], 500);

        }
    }
}