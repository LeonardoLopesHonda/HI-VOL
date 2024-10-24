<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Deflexao extends Model {
    use HasFactory;

    protected $fillable = [
        "hora_1",
        "hora_2",
        "hora_3",
        "hora_4",
        "hora_5",
        "hora_6",
        "hora_7",
        "hora_8",
        "hora_9",
        "hora_10",
        "hora_11",
        "hora_12",
        "hora_13",
        "hora_14",
        "hora_15",
        "hora_16",
        "hora_17",
        "hora_18",
        "hora_19",
        "hora_20",
        "hora_21",
        "hora_22",
        "hora_23",
        "hora_24",
        "peso_inicial_filtro",
        "peso_final_filtro",
        "id_amostragem"
    ];

    public function dadoAmostragem(){
        return $this->belongsTo(DadoAmostragem::class);
    }
}
