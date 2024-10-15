<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadoAmostragem;
use App\Models\DadosCampo;

class DeflexaoController extends Controller {
    public function index(Request $request) {
        $id_amostragem = $request->id_amostragem;
        $amostragem = DadoAmostragem::where('id', $id_amostragem)->first();
    
        return view('deflexao.home', compact('amostragem'));
    } 
}
