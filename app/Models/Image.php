<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
<<<<<<< HEAD
    protected $fillable = ['file', 'mime', 'utilizador_id'];
    /** @use HasFactory<\Database\Factories\ImageFactory> */
=======
    protected $fillable = [
        'name',
        'metadado_id',
        'file',
        'utilizador_id',
        'mime',
        'aprovado'
    ];
>>>>>>> novo_novo_final_backoffice
    use HasFactory;
}
