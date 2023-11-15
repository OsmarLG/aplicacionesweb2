<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canva extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_canva',
        'user_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
