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
        $deflexao = Deflexao::where('id', $id_amostragem)->first();
    
        return view('deflexao.home', compact('amostragem', 'deflexao'));
    } 

    public function createOrUpdate(Request $request) {
        $id_amostragem = $request->id_amostragem;
        $data = $request->validate([
            'hora_1' => 'decimal:0,2',
            'hora_2' => 'decimal:0,2',
            'hora_3' => 'decimal:0,2',
            'hora_4' => 'decimal:0,2',
            'hora_5' => 'decimal:0,2',
            'hora_6' => 'decimal:0,2',
            'hora_7' => 'decimal:0,2',
            'hora_8' => 'decimal:0,2',
            'hora_9' => 'decimal:0,2',
            'hora_10' => 'decimal:0,2',
            'hora_11' => 'decimal:0,2',
            'hora_12' => 'decimal:0,2',
            'hora_13' => 'decimal:0,2',
            'hora_14' => 'decimal:0,2',
            'hora_15' => 'decimal:0,2',
            'hora_16' => 'decimal:0,2',
            'hora_17' => 'decimal:0,2',
            'hora_18' => 'decimal:0,2',
            'hora_19' => 'decimal:0,2',
            'hora_20' => 'decimal:0,2',
            'hora_21' => 'decimal:0,2',
            'hora_22' => 'decimal:0,2',
            'hora_23' => 'decimal:0,2',
            'hora_24' => 'decimal:0,2',
            'peso_inicial_filtro' => 'required|decimal:0,2',
            'peso_final_filtro' => 'required|decimal:0,2'
        ]);
        
        $data['id_amostragem'] = $request->id_amostragem;
        
        $deflexao = Deflexao::where('id_amostragem', $request->id_amostragem)->first();

        // dd([$data, $deflexao]);

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
