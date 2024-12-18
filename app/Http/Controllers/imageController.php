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
            //$imageBlob = $request->file('image');
            $hasMetadado = $request->has('metadado_id');
            if($hasMetadado){
                $imageData = $request->validate([
                    'metadado_id' => 'nullable|integer',
                    'utilizador_id' => 'integer|required',
                    'mime' => 'string',
                    'name' => 'string',
                    'image' => 'required'
                ]);
            }else{
                $imageData = $request->validate([
                    'utilizador_id' => 'integer|required',
                    'mime' => 'string',
                    'name' => 'string',
                    'image' => 'required'
                ]);
            }
            $metadado_id = null;
            $image=$imageData['image']->getContent();

            if($hasMetadado){
                $metadado_id=$imageData['metadado_id'];
            }
            $utilizador_id=$imageData['utilizador_id'];
            $mime=$imageData['mime'];
            $name = $imageData['name'];

            if($hasMetadado){
                Image::create([
                    'name' => $name,
                    'file' =>  $image, 
                    'mime' => $mime, 
                    'utilizador_id' =>  $utilizador_id ,
                    'metadado_id' => $metadado_id
                ]);
                
            }else{
                Image::create([
                    'name' => $name,
                    'file' =>  $image, 
                    'mime' => $mime, 
                    'utilizador_id' =>  $utilizador_id
                ]);
            }

            return response()->json([
                'message' => 'Images uploaded successfully',
                'status' => 200
            ], 200);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'Error uploading images: ' . $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    public function getImage($id)
    {
        try {
            $image = Image::find($id);
            if ($image) {
                return response($image->file)->header('Content-Type', $image->mime);
            } else {
                return response()->json([
                    'message' => 'Image not found',
                    'status' => 404
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error getting image: ' . $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}
