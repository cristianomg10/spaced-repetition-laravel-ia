<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisciplinasController;
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\EstudantesController;
use App\Http\Controllers\AuthController;

Route::prefix('/disciplinas')->controller(DisciplinasController::class)->middleware('auth')->group(function(){
    Route::get('/show', 'show')->name('disciplinas.show');
    Route::get('/novo', 'novo')->name('disciplinas.novo');
    Route::get('/editar/{id}', 'editar')->name('disciplinas.editar');
    Route::get('/estudantes/{id}', 'estudantes')->name('disciplinas.estudantes');
    Route::get('/estudantes/{id}/remover/{id_estudante}', 'removerEstudante')->name('disciplinas.estudante.remover');
    Route::get('/excluir/{id}', 'excluir')->name('disciplinas.excluir');
    Route::post('/salvar/{id?}', 'salvar')->name('disciplinas.salvar');
});

Route::prefix('/modulos')->controller(ModulosController::class)->middleware('auth')->group(function(){
    Route::get('/show', 'show')->name('modulos.show');
    Route::get('/novo', 'novo')->name('modulos.novo');
    Route::get('/editar/{id}', 'editar')->name('modulos.editar');
    Route::get('/excluir/{id}', 'excluir')->name('modulos.excluir');
    Route::post('/salvar/{id?}', 'salvar')->name('modulos.salvar');
});

Route::prefix('/estudantes')->controller(EstudantesController::class)->middleware('auth')->group(function(){
    Route::get('/show', 'show')->name('estudantes.show');
    Route::get('/novo', 'novo')->name('estudantes.novo');
    Route::get('/editar/{id}', 'editar')->name('estudantes.editar');
    Route::get('/excluir/{id}', 'excluir')->name('estudantes.excluir');
    Route::post('/salvar/{id?}', 'salvar')->name('estudantes.salvar');
    Route::post('/subscrever', 'subscrever')->name('estudantes.subscrever');
    Route::get('/subscrever/{id}', 'showSubscrever')->name('estudantes.showSubscrever');
});


Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/register', 'saveRegister')->name('save.register');
    Route::post('/login', 'tryLogin')->name('try.login');
});

Route::middleware('auth')->get('/', function(){
    return view('main');
})->name('dashboard');