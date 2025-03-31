<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Modulo;
use App\Models\Disciplina;

class ModuloController extends Controller
{
    function show(){
        $modulos = Modulo::all();

        return view('modulos.show', ['modulos' => $modulos]);
    }

    function novo(){
        $disciplinas = Disciplina::all();

        return view('modulos.novo', ['disciplinas' => $disciplinas]);
    }

    function editar($id){
        $disciplinas = Disciplina::all();
        $modulo = Modulo::findOrFail($id);

        return view('modulos.editar', ['modulo' => $modulo, 'disciplinas' => $disciplinas]);
    }

    function excluir($id){
        $modulo = Modulo::findOrFail($id);
        
        $nome = $modulo->nome;
        $modulo->delete();

        session()->flash('mensagem', "Módulo {$nome} excluído com sucesso.");
        
        return redirect()->route('modulos.show');
    }

    function salvar(Request $req, $id=null){
        if ($id == null){
            // Novo
            $modulo = new Modulo();
            $operacao = "inserido";
        } else { 
            // Alteração
            $modulo = Modulo::findOrFail($id);
            $operacao = "alterado";
        }     
        $modulo->nome = $req->nome;
        $modulo->disciplina_id = $req->disciplina_id;

        $modulo->save();

        session()->flash('mensagem', "Módulo {$modulo->nome} {$operacao} com sucesso.");
        
        return redirect()->route('modulos.show');
    }
}
