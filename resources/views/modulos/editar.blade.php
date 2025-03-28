@extends('template')

@section('conteudo')
<h1>Módulo <b>{{ $modulo->nome }}</b></h1>

<form method="post" action="{{ route('modulos.salvar', [ 'id' => $modulo->id ]) }}">
    @csrf
    <div class="row">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="nome" name="nome" class="form-control" id="nome" placeholder="Nome do módulo"
            value="{{ $modulo->nome }}">
        </div>
        <div class="mb-3">
            <label for="disciplina" class="form-label">Disciplina relacionada</label>
            <select class="form-select" aria-label="Selecine a disciplina relacionada" id="disciplina" name="disciplina_id" required>
                <option value="">Selecione uma disciplina</option>
                @foreach($disciplinas as $disciplina)
                <option value="{{ $disciplina->id }}" {{ ($disciplina->id==$modulo->disciplina_id ? "selected": "") }}>{{ $disciplina->nome }}</option>
                @endforeach
            </select>
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
        <p>Deseja realmente excluir o Módulo <b>{{ $modulo->nome }}</b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="{{ route('modulos.excluir', ['id' => $modulo->id]) }}" class="btn btn-outline-danger">Excluir</a>
      </div>
    </div>
  </div>
</div>
@endsection