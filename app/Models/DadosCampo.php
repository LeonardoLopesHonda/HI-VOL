<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dadoAmostragem;

class DadosCampo extends Model
{
    use HasFactory;

    protected $fillable = [
        'temperatura_media_ambiente', 
        'temperatura_media_sazonal', 
        'pressao_barometrica_media', 
        'pressao_barometrica_sazonal', 
        'leitura_inicial', 
        'leitura_final', 
        'diferenca_horametro',
        'id_amostragem'
    ];

    public function dadoAmostragem(){
        return $this->belongsTo(DadoAmostragem::class);
    }
}
