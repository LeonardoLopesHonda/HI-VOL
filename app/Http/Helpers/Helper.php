<?php

namespace App\Http\Helpers;

use App\Models\User;
use App\Models\Filtro;
use App\Models\DadoAmostragem;
use App\Models\DadosCampo;
use App\Models\Deflexao;

class Helper {
    public static function calculateVolume($filtro_id, $amostragem_id) {
        $filtro = Filtro::where("id", $filtro_id)->first();
        $deflexao = Deflexao::where("id", $amostragem_id)->first();
        $dados_campo = DadosCampo::where("id_amostragem", $amostragem_id)->first();

        if($deflexao == null || $dados_campo == null) return 0;

        // dd($filtro, $deflexao, $dados_campo);
    
        // Dados para calcular Vazão
        $volume = 0;
        $a2 = $filtro->inclinacao;
        $b2 = $filtro->intercepto;
        $t3 = $dados_campo->temperatura_media_ambiente;
        $p3 = $dados_campo->pressao_barometrica_media;
    
        // dd($deflexao);
        // dd($inclinacao, $intercepto, $temperatura_ambiente, $pressao_barometrica);

        $volume += (1/$a2) * (sqrt($deflexao->hora_1 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_2 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_3 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_4 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_5 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_6 * ($p3/760) * (298/$t3)) - $b2);

        $volume += (1/$a2) * (sqrt($deflexao->hora_7 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_8 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_9 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_10 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_11 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_12 * ($p3/760) * (298/$t3)) - $b2);

        $volume += (1/$a2) * (sqrt($deflexao->hora_13 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_14 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_15 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_16 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_17 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_18 * ($p3/760) * (298/$t3)) - $b2);

        $volume += (1/$a2) * (sqrt($deflexao->hora_19 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_20 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_21 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_22 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_23 * ($p3/760) * (298/$t3)) - $b2);
        $volume += (1/$a2) * (sqrt($deflexao->hora_24 * ($p3/760) * (298/$t3)) - $b2);
        $volume *= 60;
        
        return bcdiv($volume, 1, 2);
    }

    public static function calculatePesoLiquido($amostragem_id) {
        $deflexao = Deflexao::where("id", $amostragem_id)->first();

        if($deflexao == null || $deflexao->peso_final_filtro == null && $deflexao->peso_inicial_filtro == null) return 0;

        $peso_liquido = $deflexao->peso_final_filtro - $deflexao->peso_inicial_filtro;

        return $peso_liquido;
    }

    public static function calculatePTS($volume, $peso_liquido) {
        if($volume == null && $peso_liquido == null) return 0;
        $pts = ($peso_liquido / (float) $volume)*pow(10, 6);
        return bcdiv($pts, 1, 2);
    }
}

?>