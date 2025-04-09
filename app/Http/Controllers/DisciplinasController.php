<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Estudante;

class DisciplinasController extends Controller
{
    function show(){
        $disciplinas = Disciplina::all();

        return view('disciplinas.show', ['disciplinas' => $disciplinas]);
    }

    function estudantes($id){
        $disciplina = Disciplina::findOrFail($id);

        return view('disciplinas.estudantes', ['disciplina' => $disciplina]);
    }

    function removerEstudante($id, $id_estudante){
        $disciplina = Disciplina::findOrFail($id);
        $estudante = Estudante::findOrFail($id_estudante);

        $disciplina->estudantes()->detach($estudante);

        return redirect(route('disciplinas.estudantes', ['id' => $disciplina->id]));
    }

    function novo(){
        return view('disciplinas.novo');
    }

    function editar($id){
        $disciplina = Disciplina::findOrFail($id);

        return view('disciplinas.editar', ['disciplina' => $disciplina]);
    }

    function excluir($id){
        $disciplina = Disciplina::findOrFail($id);
        
        $nome = $disciplina->nome;
        $disciplina->delete();

        session()->flash('mensagem', "Disciplina {$nome} excluída com sucesso.");
        
        return redirect()->route('disciplinas.show');
    }

    function salvar(Request $req, $id=null){
        if ($id == null){
            // Novo
            $disciplina = new Disciplina();
            $operacao = "inserida";
        } else { 
            // Alteração
            $disciplina = Disciplina::findOrFail($id);
            $operacao = "alterada";
        }        

        $disciplina->nome = $req->nome;
        $disciplina->save();
        
        session()->flash('mensagem', "Disciplina {$disciplina->nome} {$operacao} com sucesso.");
        
        return redirect()->route('disciplinas.show');
    }

}
