<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipodocumento', 'nrodocumento', 'nroexpediente', 'entidad', 'email', 'celular', 'area', 'asunto', 'estado', 'archivo'
    ];
}
