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

    function showSubscrever($id){
        $estudante = Estudante::findOrFail($id);
        $disciplinas = Disciplina::all();

        return view('disciplinas.agregar_estudante', ['estudante' => $estudante, 'disciplinas' => $disciplinas]);
    }

    function subscrever(Request $req){
        $estudante = Estudante::findOrFail($req->id);
        $disciplina = Disciplina::findOrFail($req->disciplina_id);

        if ($disciplina->estudantes()->where('estudante_id', '=', $estudante->id)->count() == 0){
            $disciplina->estudantes()->attach($estudante, ['oferta' => env('OFERTA')]);
            session()->flash('mensagem', "Estudante <b>{$estudante->nome}</b> subscreveu com sucesso na disciplina <b>{$disciplina->nome}</b>.");
        } else {
            session()->flash('mensagem', "Estudante <b>{$estudante->nome}</b> já estava subscrito na disciplina <b>{$disciplina->nome}</b>.");
        }

        return redirect()->route('estudantes.show');
    }
}
