<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image; // Model vinculada à tabela `images`

class imageController extends Controller 
{
    public function uploadImages(Request $request)
    {

        try {

            $request->validate([
                'image' => 'required|array',
                'image.*.image' => 'required',
                'image.*.mime' => 'required|string', 
                'image.*.user_id' => 'required|integer'
            ]);

            foreach ($request->input('image') as $imageData) {
                Image::create([
                    'image' => $imageData['image'], 
                    'mime' => $imageData['mime'], 
                    'utilizador_id' => $imageData['user_id'] 
                ]);
            }

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
