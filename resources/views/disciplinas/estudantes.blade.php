@extends('template')

@section('conteudo')
<h1>Disciplina <b>{{ $disciplina->nome }}</b></h1>
<h2>Estudantes vinculados</h2>

@if(session()->has('mensagem'))
    <div class="alert alert-info">{{ session('mensagem') }}</div>
@endif

<div>
    @if(count($disciplina->estudantes) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Oferta</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($disciplina->estudantes as $estudante)
            <tr>
                <td>{{ $estudante->pivot->id }}</td>
                <td>{{ $estudante->nome }}</td>
                <td>{{ $estudante->pivot->oferta }}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="#">Editar</a>
                    <a class="btn btn-danger btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $estudante->pivot->id }}">Excluir</a>
                </td>
            </tr>
            <div class="modal fade" id="modalExcluir{{ $estudante->pivot->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $estudante->pivot->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalLabel{{ $estudante->pivot->id }}">Exclusão</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Deseja realmente excluir o vínculo do(a) estudante <b>{{ $estudante->nome }}</b> na disciplina <b>{{ $disciplina->nome }}</b>?
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-outline-danger" href="{{ route('disciplinas.estudante.remover', ['id'=> $disciplina->id, 'id_estudante' => $estudante->id]) }}">Excluir</a>
                            <button type="button"  data-bs-dismiss="modal" class="btn btn-primary">Não</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach    
        </tbody>
    </table>
    @else
    <div class="alert alert-info" role="alert">
        Ainda não há dados inseridos
    </div>
    @endif
</div>
<div>
<a class="btn btn-primary" href="#">Novo</a>
</div>
@endsection