<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudante;

class EstudantesController extends Controller
{
    function show(){
        $estudantes = Estudante::all();

        return view('estudantes.show', ['estudantes' => $estudantes]);
    }

    function novo(){

        return view('estudantes.novo');
    }

    function editar($id){
        $estudante = Estudante::findOrFail($id);

        return view('estudantes.editar', ['estudante' => $estudante]);
    }

    function excluir($id){
        $estudante = Estudante::findOrFail($id);
        
        $nome = $estudante->nome;
        $estudante->delete();

        session()->flash('mensagem', "Módulo {$nome} excluída com sucesso.");
        
        return redirect()->route('estudantes.show');
    }

    function salvar(Request $req, $id=null){
        if ($id == null){
            // Novo
            $estudante = new Estudante();
            $operacao = "inserido";
        } else { 
            // Alteração
            $estudante = Estudante::findOrFail($id);
            $operacao = "alterado";
        }     
        $estudante->nome = $req->nome;
        $estudante->disciplina_id = $req->disciplina_id;

        $estudante->save();

        session()->flash('mensagem', "Estudante {$estudante->nome} {$operacao} com sucesso.");
        
        return redirect()->route('estudantes.show');
    }
}
