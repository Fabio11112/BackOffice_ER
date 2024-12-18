<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image; // Model vinculada à tabela `images`
use Illuminate\Support\Facades\Log;

class imageController extends Controller 
{
    public function uploadImages(Request $request)
    {

        Log::info($request);
        
        try {

            $imageData = $request->validate([
                'metadado_id' => 'nullable|integer',
                'utilizador_id' => 'integer|required',
                'mime' => 'string',
                'name' => 'string',
                'image' => 'required'
            ]);

            $image=$imageData['image'];
            $metadado_id=$imageData['metadado_id'];
            $utilizador_id=$imageData['utilizador_id'];
            $mime=$imageData['mime'];
            $name = $imageData['name'];
            Image::create([
                'name' => $name,
                'file' =>  $image, 
                'mime' => $mime, 
                'utilizador_id' =>  $utilizador_id ,
                'metadado_id' => $metadado_id
            ]);
            

            return response()->json([
                'message' => 'Images uploaded successfully',
                'status' => 200
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error uploading images: ' . $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}
