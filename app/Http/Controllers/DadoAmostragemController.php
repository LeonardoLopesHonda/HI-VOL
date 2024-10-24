<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Filtro;
use App\Models\DadoAmostragem;
use App\Models\DadoCampo;
use App\Models\Deflexao;

class DadoAmostragemController extends Controller {
    public function index(Request $request) {
        $users = User::all();
        $amostragens = DadoAmostragem::get();
        $filtros = Filtro::get();

        return view('amostragens.home', compact('amostragens', 'filtros' , 'users'));
    }

    public function create(Request $request) {
        $data = $request->validate([
            'data_amostragem' => 'required|date',
            'duracao' => 'int',
            'tipo_filtro' => 'string',
            'n_filtro' => 'required|int',
        ]);
        
        $data['user_id'] = auth()->id();
        $dado = DadoAmostragem::create($data);

        return to_route('amostragens.home')->with('message', 'Amostragem foi cadastrada');
    }

    public function delete(Request $request) {
        $id = $request->id;
        
        $amostragem = DadoAmostragem::findOrFail($id);
        $amostragem->delete();

        return to_route('amostragens.home')->with('message', 'Amostragem foi excluida');
    }

    public function edit(Request $request) {
        $filtro_id = $request->filtro_id;
        $amostragem_id = $request->amostragem_id;

        $filtro = Filtro::where('id', $filtro_id);
        $amostragem = DadoAmostragem::where('id', $amostragem_id);

        $data = $request->validate([
            'data_amostragem' => 'required|date',
            'duracao' => 'int',
            'tipo_filtro' => 'string',
            'n_filtro' => 'required|int',
        ]);

        $amostragem->update($data);

        return to_route('amostragens.home')->with('message', 'Amostragem foi editada');
    }
}
