@extends('template')

@section('conteudo')
<h1>Agregar Estudante em Disciplina <b>{{ $disciplina->nome }}</b></h1>

<form method="post" action="{{ route('estudantes.subscrever') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $estudante->id }}" />
    <div class="row">
        <div class="mb-3">
            <label for="disciplina" class="form-label">Disciplina associada</label>
            <select class="form-select" aria-label="Selecine a disciplina relacionada" id="disciplina" name="disciplina_id" required>
                <option selected value="">Selecione uma disciplina</option>
                @foreach($disciplinas as $disciplina)
                <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
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
@endsection