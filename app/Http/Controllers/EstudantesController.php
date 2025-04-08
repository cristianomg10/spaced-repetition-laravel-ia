<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudante;
use App\Models\Disciplina;

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
        $matricula = $estudante->matricula;
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
        $estudante->matricula = $req->matricula;

        $estudante->save();

        session()->flash('mensagem', "Estudante {$estudante->nome} {$operacao} com sucesso.");
        
        return redirect()->route('estudantes.show');
    }

    function showSubscrever($id_discplina){
        $estudantes = Estudante::all();

        return view('disciplinas.agregar_estudante', ['estudantes' => $estudantes]);
    }

    function subscrever(Request $req, $id, $disciplina_id){
        $estudante = Estudante::findOrFail($id);
        $disciplina = Disciplina::findOrFail($disciplina_id);

        if ($disciplina->estudantes()->where('estudante_id', '=', $id)->count() == 0){
            $disciplina->estudantes()->attach($estudante, ['oferta' => env('OFERTA')]);
            session()->flash('mensagem', "Estudante {$estudante->nome} subscreveu com sucesso na disciplina {$disciplina->nome}.");
        } else {
            session()->flash('mensagem', "Estudante {$estudante->nome} já estava subscrito na disciplina {$disciplina->nome}.");
        }

        return redirect()->route('');
    }
}
