<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadoAmostragem;

class DadoAmostragemController extends Controller {
    public function create(Request $request) {
        $data = $request->validate([
            'data_amostragem' => 'required|date',
            'n_filtro' => 'required|int',
            'user_id' => 'nullable'
        ]);
        
        $data['user_id'] = auth()->id();
        $dado = DadoAmostragem::create($data);

        return to_route('home')->with('message', 'Filtro foi cadastrado');
    }
}
