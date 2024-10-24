<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_filtro', 
        'local', 
        'calibrado_CPV', 
        'inclinacao', 
        'ultima_calibracao', 
        'intercepto', 
        'correlacao',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function DadoAmostragem(){
        return $this->belongsTo(DadoAmostragem::class);
    }
}
