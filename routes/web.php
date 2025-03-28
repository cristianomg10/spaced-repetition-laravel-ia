<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\ModuloController;

Route::get('/', function(){
    return view('main');
});

Route::prefix('/disciplinas')->controller(DisciplinaController::class)->group(function(){
    Route::get('/show', 'show')->name('disciplinas.show');
    Route::get('/novo', 'novo')->name('disciplinas.novo');
    Route::get('/editar/{id}', 'editar')->name('disciplinas.editar');
    Route::get('/excluir/{id}', 'excluir')->name('disciplinas.excluir');
    Route::post('/salvar/{id?}', 'salvar')->name('disciplinas.salvar');
});

Route::prefix('/modulos')->controller(ModuloController::class)->group(function(){
    Route::get('/show', 'show')->name('modulos.show');
    Route::get('/novo', 'novo')->name('modulos.novo');
    Route::get('/editar/{id}', 'editar')->name('modulos.editar');
    Route::get('/excluir/{id}', 'excluir')->name('modulos.excluir');
    Route::post('/salvar/{id?}', 'salvar')->name('modulos.salvar');
});


