<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class imageController extends Controller 
{
    public function uploadImages(Request $request){
        try
        {
            foreach($request as $image){
                $validated =  $image->validate([
                    'image' => 'required',
                    'mime' => 'required|string',
                    'utilizador_id' => 'required|integer'
                ]);

                Image::create($validated);
            }

            return response()->json(['message' => 'Image uploaded successfully']);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Error uploading image'], 500);
        }
    }
}