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
</form>
@endsection