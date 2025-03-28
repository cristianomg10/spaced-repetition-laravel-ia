@extends('template')

@section('conteudo')
<h1>Disciplina <b>{{ $disciplina->nome }}</b></h1>

<form method="post" action="{{ route('disciplinas.salvar', [ 'id' => $disciplina->id ]) }}">
    @csrf
    <div class="row">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="nome" name="nome" class="form-control" id="nome" placeholder="Nome da disciplina"
            value="{{ $disciplina->nome }}">
        </div>
    </div>
    <hr>
    <input type="submit" value="Salvar mudanças" class="btn btn-success" />
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir">
        Excluir
    </button>
</form>

<div class="modal" tabindex="-1" id="modalExcluir">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir a disciplina <b>{{ $disciplina->nome }}</b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="{{ route('disciplinas.excluir', ['id' => $disciplina->id]) }}" class="btn btn-outline-danger">Excluir</a>
      </div>
    </div>
  </div>
</div>
@endsection