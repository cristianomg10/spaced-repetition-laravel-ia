@extends('template')

@section('conteudo')
<h1>Novo(a) estudante</h1>

<form method="post" action="{{ route('estudantes.salvar') }}">
    @csrf
    <div class="row">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="nome" name="nome" class="form-control" id="nome" placeholder="Nome do(a) estudante"
            value="">
        </div>
        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula</label>
            <input type="matricula" name="matricula" class="form-control" id="matricula" placeholder="Matricula do(a) estudante"
            value="">
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
        <p>Deseja realmente excluir o(a) estudante <b>{{ $estudante->nome }}</b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="{{ route('estudantes.excluir', ['id' => $estudante->id]) }}" class="btn btn-outline-danger">Excluir</a>
      </div>
    </div>
  </div>
</div>
@endsection