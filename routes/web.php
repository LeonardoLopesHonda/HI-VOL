<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadoAmostragemController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\DadosCampoController;
use App\Http\Controllers\DeflexaoController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Filtro Routes
    Route::get('filtros/home', [FiltroController::class, 'index'])->name('filtros.home');
    Route::post('/createFiltro', [FiltroController::class, 'create'])->name('filtros.add');
    Route::delete('/deleteFiltro', [FiltroController::class, 'delete'])->name('filtros.delete');
    Route::put('/editFiltro', [FiltroController::class, 'edit'])->name('filtros.edit');

// Amostragens Routes
    Route::get('/amostragem/home', [DadoAmostragemController::class, 'index'])->name('amostragens.home');
    Route::post('/createAmostragem', [DadoAmostragemController::class, 'create'])->name('amostragens.add');
    Route::delete('/deleteAmostragem', [DadoAmostragemController::class, 'delete'])->name('amostragens.delete');
    Route::put('/editAmostragem', [DadoAmostragemController::class, 'edit'])->name('amostragens.edit');

// Campo Routes
    Route::get('/amostragem/{id_amostragem}/campo/', [DadosCampoController::class, 'index'])->name('campo.home');
    Route::post('/amostragem/{id_amostragem}/createCampo', [DadosCampoController::class, 'createOrUpdate'])->name('campo.add');

// Deflexão Routes
    Route::get('/amostragem/{id_amostragem}/deflexao/', [DeflexaoController::class, 'index'])->name('deflexao.home');
    Route::post('/amostragem/{id_amostragem}/createDeflexao', [DeflexaoController::class, 'createOrUpdate'])->name('deflexao.add');

Auth::routes();