<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadoAmostragemController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [DadoAmostragemController::class, 'index'])->name('dados.index');
Route::post('/createFiltro', [DadoAmostragemController::class, 'create'])->name('dados.add');

Auth::routes();