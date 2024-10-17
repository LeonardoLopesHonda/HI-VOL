<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadoAmostragem;
use App\Models\DadosCampo;
use App\Models\Deflexao;

class DeflexaoController extends Controller {
    public function index(Request $request) {
        $id_amostragem = $request->id_amostragem;
        $amostragem = DadoAmostragem::where('id', $id_amostragem)->first();
    
        return view('deflexao.home', compact('amostragem'));
    } 

    public function createOrUpdate(Request $request) {
        $id_amostragem = $request->id_amostragem;
        $data = $request->validate([
            'hora_1' => '',
            'hora_2' => '',
            'hora_3' => '',
            'hora_4' => '',
            'hora_5' => '',
            'hora_6' => '',
            'hora_7' => '',
            'hora_8' => '',
            'hora_9' => '',
            'hora_10' => '',
            'hora_11' => '',
            'hora_12' => '',
            'hora_13' => '',
            'hora_14' => '',
            'hora_15' => '',
            'hora_16' => '',
            'hora_17' => '',
            'hora_18' => '',
            'hora_19' => '',
            'hora_20' => '',
            'hora_21' => '',
            'hora_22' => '',
            'hora_23' => '',
            'hora_24' => '',
            'peso_inicial_filtro' => 'required|',
            'peso_final_filtro' => 'required|'
        ]);
        
        $data['id_amostragem'] = $request->id_amostragem;
        
        $deflexao = Deflexao::where('id_amostragem', $request->id_amostragem)->first();

        if ($deflexao) {
            $deflexao->update($data);
            $message = 'Dados de Deflexão atualizados';
        } else {
            Deflexao::create($data);
            $message = 'Dados de Deflexão cadastrados';
        }

        return to_route('amostragens.home')->with('message', $message);
    }
}
