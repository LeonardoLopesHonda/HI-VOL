<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Filtro;
use Illuminate\Support\Facades\Auth;

class FiltroController extends Controller {
    public function index(Request $request) {
        $users = User::all();
        // $amostragens = DadoAmostragem::get();
        $filtros = Filtro::get();

        // dd($user);

        return view('filtros.home', compact('filtros', 'users'));
    }

    public function create(Request $request) {
        $user_id = auth()->id();
        $data = $request->validate([
            'n_filtro' => 'required|int',
            'local' => 'required|string',
            'calibrado_CPV' => 'decimal:0,4',
            'inclinacao' => 'decimal:0,4',
            'ultima_calibracao' => 'date',
            'intercepto' => 'decimal:0,4',
            'correlacao' => 'decimal:0,4'
        ]);

        // dd($data);

        $data['user_id'] = $user_id;
        $filtro = Filtro::create($data);

        return to_route('filtros.home')->with('message', 'Filtro foi cadastrado');
    }

    public function delete(Request $request) {
        $id = $request->id;
        $filtro = Filtro::findOrFail($id);
        $filtro->delete();

        return to_route('filtros.home')->with('message', 'Filtro foi excluído');
    }

    public function edit(Request $request) {
        $id = $request->id;
        $filtro = Filtro::where('id', $id)->firstOrFail();

        $data = $request->validate([
            'n_filtro' => 'required|int',
            'local' => 'required|string',
            'calibrado_CPV' => 'decimal:0,4',
            'inclinacao' => 'decimal:0,4',
            'ultima_calibracao' => 'date',
            'intercepto' => 'decimal:0,4',
            'correlacao' => 'decimal:0,4'
        ]);

        $data['user_id'] = $filtro->user_id;
        // dd($filtro);

        $filtro->update($data);

        return to_route('filtros.home')->with('message', 'Filtro foi alterado');
    }
}
