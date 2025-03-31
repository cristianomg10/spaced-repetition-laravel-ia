<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisciplinasController;
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\EstudantesController;

Route::get('/', function(){
    return view('main');
});

Route::prefix('/disciplinas')->controller(DisciplinasController::class)->group(function(){
    Route::get('/show', 'show')->name('disciplinas.show');
    Route::get('/novo', 'novo')->name('disciplinas.novo');
    Route::get('/editar/{id}', 'editar')->name('disciplinas.editar');
    Route::get('/excluir/{id}', 'excluir')->name('disciplinas.excluir');
    Route::post('/salvar/{id?}', 'salvar')->name('disciplinas.salvar');
});

Route::prefix('/modulos')->controller(ModulosController::class)->group(function(){
    Route::get('/show', 'show')->name('modulos.show');
    Route::get('/novo', 'novo')->name('modulos.novo');
    Route::get('/editar/{id}', 'editar')->name('modulos.editar');
    Route::get('/excluir/{id}', 'excluir')->name('modulos.excluir');
    Route::post('/salvar/{id?}', 'salvar')->name('modulos.salvar');
});

Route::prefix('/estudantes')->controller(EstudantesController::class)->group(function(){
    Route::get('/show', 'show')->name('estudantes.show');
    Route::get('/novo', 'novo')->name('estudantes.novo');
    Route::get('/editar/{id}', 'editar')->name('estudantes.editar');
    Route::get('/excluir/{id}', 'excluir')->name('estudantes.excluir');
    Route::post('/salvar/{id?}', 'salvar')->name('estudantes.salvar');
});


