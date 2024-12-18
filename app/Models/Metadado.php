<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadado extends Model
{
    protected $fillable = [
        'utilizador_id',
        'qnt_avistamentos',
        'latitude',
        'longitude',
        'num_crias',
        'data_hora_avistamento',
        'empresa_barcos',
        'comportamento_especies',
        'beaufourt_scale'
        
    ];
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;
}

