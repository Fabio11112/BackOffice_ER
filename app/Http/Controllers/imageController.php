<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Log;

class imageController extends Controller 
{
    public function uploadImages(Request $request)
    {
        try {

           // $data = $request->json->all();

            Log::info("Array do Request uploadImage:\n");
            Log::info($request);

            // $request->validate([
            //     'images' => 'required|array',
            //     'image.*.image' => 'required|string',
            //     'image.*.mime' => 'required|string',
            //     'image.*.user_id' => 'required|integer'
            // ]);

            foreach ($request->input('images') as $imageData) {
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