<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    use HasFactory;
    protected $fillable = [
        'usuario', 'frutas', 'enemigos', 'ult_distancia', 'fecha_record', 'record', 'numero_partidas','activo','visible'
    ];
}
