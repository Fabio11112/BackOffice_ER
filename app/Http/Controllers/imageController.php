<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class imageController extends Controller 
{
    public function uploadImages(Request $request){
        try
        {
            foreach($request->all() as $imageData){
                $validated =  $imageData->validate([
                    'image' => 'required',
                    'mime' => 'required|string',
                    'utilizador_id' => 'required|integer'
                ]);

                Image::create($validated);
            }

            return response()->json(['message' => 'Image uploaded successfully', 'status' => 200]);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Error uploading image:' + $e], 500);
        }
    }
}