<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Image;
use Illuminate\Support\Facades\Log;

use \Illuminate\Http\UploadedFile;
=======
use App\Models\Image; // Model vinculada à tabela `images`
use Illuminate\Support\Facades\Log;
>>>>>>> novo_novo_final_backoffice

class imageController extends Controller 
{
    public function uploadImages(Request $request)
    {
<<<<<<< HEAD
        try {

           // $data = $request->json->all();

            Log::info("Array do Request uploadImage:\n");
            Log::info($request);
            Log::info("\n\n");
            
            Log::info($request['mime']);
            Log::info($request['user_id']);

            Log::info("Array do Request uploadImage->images:\n");

            $request->validate([
                'image' => 'required|array',
                'mime' => 'required|string',
                'user_id' => 'required|integer'
            ]);

            Log::info("Request validado\n");
            

            foreach ($request->file('image') as $file) {
                Log::info("Image data:\n");
                Image::create([
                    'file' => $file->get(), 
                    'mime' => $request['mime'], 
                    'utilizador_id' => $request['user_id']
=======

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
>>>>>>> novo_novo_final_backoffice
                ]);
            }
            Log::info("Images criadas\n");
            

            return response()->json([
                'message' => 'Images uploaded successfully',
                'status' => 200
            ], 200);

        } catch (\Exception $e) {
<<<<<<< HEAD
            return response()->json([
                'message' => 'Error uploading images: ' . $e->getMessage(),
                Log::info("Error uploading images: " . $e->getMessage()),
=======
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'Error uploading images: ' . $e->getMessage(),
>>>>>>> novo_novo_final_backoffice
                'status' => 500
            ], 500);
        }
    }

    public function getImage($id)
    {
        try {
            $image = Image::find($id);
<<<<<<< HEAD

=======
>>>>>>> novo_novo_final_backoffice
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
<<<<<<< HEAD

    // public function uploadImages(Request $request){
    //     try
    //     {
    //         //print($request);
    //         foreach($request->all() as $imageData){
    //             $validated =  $imageData->validate([
    //                 'image' => 'required',
    //                 'mime' => 'required|string',
    //                 'utilizador_id' => 'required|integer'
    //             ]);

    //             Image::create($validated);
    //         }

    //         return response()->json(['message' => 'Image uploaded successfully', 'status' => 200]);
    //     }
    //     catch(\Exception $e)
    //     {
    //         return response()->json(['message' => 'Error uploading image:' + $e], 500);
    //     }
    // }
}
=======
}
>>>>>>> novo_novo_final_backoffice
