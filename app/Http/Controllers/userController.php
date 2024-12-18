<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilizador;
use Illuminate\Support\Facades\Log;

class userController extends Controller
{
    public function recebeUser(Request $request)
    {
        Log::info($request);
        try{
            $validated = $request->validate([
                'user_id' => 'required|integer',
            ]);

            $user_id = $validated['user_id'];

            $users = Utilizador::where('user_id', $user_id)->get();
            if ($users->isEmpty()) {

                Log::info("ANTES DO CREATE");
                Utilizador::create(['user_id' => $user_id]);
                Log::info("ANTES return");
                return response()->json([
                    'message' => 'User registered in database successfully',
                    'status' => 200
                ], 200);
            }

            return response()->json([
                'message' => 'User already registered in databse',
                'status' => 200
            ], 200);
            
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error uploading User: ' . $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    

}
