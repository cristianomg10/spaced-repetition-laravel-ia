@extends('template')

@section('conteudo')
<h1>Disciplina (Nova)</h1>

<form method="post" action="{{ route('disciplinas.salvar') }}">
    @csrf
    <div class="row">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="nome" name="nome" class="form-control" id="nome" placeholder="Nome da disciplina">
        </div>
    </div>
    <hr>
    <input type="submit" value="Salvar" class="btn btn-success" />
</form>
@endsection