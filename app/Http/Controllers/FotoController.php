<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FotoController extends Controller
{
    public function analisaFoto($id)
    {
        LOG::info('ENTROU NO METODO ANALISAFOTO');
        $response = Http::get('https://wave-labs.org/api/creature');
        

        $creaturesSubEspecies = $response->successful() ? $response->json() : [];

        $creature = collect($creaturesSubEspecies)->firstWhere('id', $id);

        if (!$creature) {
            return redirect()->back()->with('error', 'Criatura não encontrada.');
        }

        return view('analisa-foto', ['creature' => $creature]);
    }
}
