<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadoAmostragem extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_filtro',
        'data_amostragem',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
