<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadoAmostragem;
use App\Models\DadosCampo;

class DadosCampoController extends Controller {
    public function index(Request $request) {
        $id_amostragem = $request->id_amostragem;
        $amostragem = DadoAmostragem::where('id', $id_amostragem)->first();
    
        // Try to find existing DadosCampo for this DadoAmostragem
        $dadosCampo = DadosCampo::where('id_amostragem', $id_amostragem)->first();
    
        // If no DadosCampo exists, create a default one with empty or default values
        if (!$dadosCampo) {
            $dadosCampo = new DadosCampo([
                'temperatura_ambiente_media' => null,
                'temperatura_ambiente_sazonal' => null,
                'pressao_barometrica_media' => null,
                'pressao_barometrica_sazonal' => null,
                'leitura_inicial' => null,
                'leitura_final' => null,
                'diferenca_horametro' => null
            ]);
        }
    
        return view('campo.home', compact('amostragem', 'dadosCampo'));
    }

    public function createOrUpdate(Request $request) {
        // dd($request);
        $data = $request->validate([
            'temperatura_media_ambiente' => 'required|numeric',
            'temperatura_media_sazonal' => 'numeric',
            'pressao_barometrica_media' => 'required|numeric',
            'pressao_barometrica_sazonal' => 'numeric',
            'leitura_inicial' => 'numeric',
            'leitura_final' => 'numeric',
        ]);
        
        $data['diferenca_horametro'] = ($request->leitura_inicial - $request->leitura_final);
        $data['id_amostragem'] = $request->id_amostragem;
        
        $dadosCampo = DadosCampo::where('id_amostragem', $request->id_amostragem)->first();

        if ($dadosCampo) {
            $dadosCampo->update($data);
            $message = 'Dados de Campo atualizados';
        } else {
            DadosCampo::create($data);
            $message = 'Dados de Campo cadastrados';
        }

        return to_route('amostragens.home')->with('message', $message);
    }
}
