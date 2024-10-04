<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadoAmostragem;

class DadoAmostragemController extends Controller {
    public function create(Request $request) {
        $data = $request->validate([
            'data_amostragem' => 'required|date',
            'duracao' => 'int',
            'tipo_filtro' => 'string',
            'n_filtro' => 'required|int',
        ]);
        
        $data['user_id'] = auth()->id();
        $dado = DadoAmostragem::create($data);

        return to_route('home')->with('message', 'Amostragem foi cadastrada');
    }

    public function delete(Request $request) {
        $id = $request->id;
        
        $amostragem = DadoAmostragem::findOrFail($id);
        $amostragem->delete();

        return to_route('home')->with('message', 'Amostragem foi excluida');
    }
}
