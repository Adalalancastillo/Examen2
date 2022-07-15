<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Alumno extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'alumnos';
    protected $fillable = [
        'nombre',
        'edad',
        'genero',
        'carrera',
        'ednia_indigena',
        'horario',
        'calificacion_prepa',
        'becado',
        'problema_de_salud'
    ];
    use HasFactory;
}
