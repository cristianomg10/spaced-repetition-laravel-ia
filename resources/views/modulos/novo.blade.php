@extends('template')

@section('conteudo')
<h1>Novo Módulo</h1>
<form method="post" action="{{ route('modulos.salvar') }}">
    @csrf
    <div class="row">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="nome" name="nome" class="form-control" id="nome" placeholder="Nome do módulo">
        </div>
        <div class="mb-3">
            <label for="disciplina" class="form-label">Disciplina relacionada</label>
            <select class="form-select" aria-label="Selecine a disciplina relacionada" id="disciplina" name="disciplina_id" required>
                <option selected value="">Selecione uma disciplina</option>
                @foreach($disciplinas as $disciplina)
                <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <input type="submit" value="Salvar" class="btn btn-success" />
</form>
@endsection