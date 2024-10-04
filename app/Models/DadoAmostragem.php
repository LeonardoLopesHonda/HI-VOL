<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadoAmostragem extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_amostragem',
        'duracao',
        'tipo_filtro',
        'n_filtro',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
