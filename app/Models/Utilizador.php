<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilizador extends Model
{
    protected $fillable = ['user_id'];

    /** @use HasFactory<\Database\Factories\UtilizadorFactory> */
    use HasFactory;
}
