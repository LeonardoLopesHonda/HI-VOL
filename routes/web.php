<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadoAmostragemController;
use App\Http\Controllers\FiltroController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Filtro Routes
    Route::post('/createFiltro', [FiltroController::class, 'create'])->name('filtros.add');
    Route::delete('/deleteFiltro', [FiltroController::class, 'delete'])->name('filtros.delete');
    Route::put('/editFiltro', [FiltroController::class, 'edit'])->name('filtros.edit');

// Amostragens Routes
    Route::post('/createAmostragem', [DadoAmostragemController::class, 'create'])->name('amostragens.add');
    Route::delete('/deleteAmostragem', [DadoAmostragemController::class, 'delete'])->name('amostragens.delete');

Auth::routes();