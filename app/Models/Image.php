<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['file', 'mime', 'utilizador_id'];
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;
}
