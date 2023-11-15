<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'edad', 'sexo', 'frecuencia', 'acercamiento', 'satisfaccion', 'mejorar',
        'comentario', 'futuro', 'correo', 'user_id'
    ];

    public function getUsuario($id){
        return User::find($id);
    }
    
}
