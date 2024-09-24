<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadoAmostragemController;

Route::get('/home', [DadoAmostragemController::class, 'index'])->name('dados.index');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');