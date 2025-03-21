<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos'; // Nombre de la tabla en la BD

    protected $fillable = [
        'nombre',
        'correo',
        'fecha_nacimiento',
        'ciudad',
    ];
}
