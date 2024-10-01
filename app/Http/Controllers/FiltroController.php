<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiltroController extends Controller
{
    public function create(Request $request) {
        $data = $request->validate([
            'n_filtro' => 'required|int',
            'local' => 'required|string',
            'calibrado_CPV' => 'double',
            'inclinacao' => 'double',
            'ultima_calibracao' => 'date',
            'intercepto' => 'double',
            'correlacao' => 'double'
        ]);
    }

}
