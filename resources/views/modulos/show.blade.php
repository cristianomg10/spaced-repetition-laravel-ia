@extends('template')

@section('conteudo')
<h1>Módulos cadastrados</h1>
@if(count($modulos) > 0)
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Disciplina</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($modulos as $modulo)
        <tr>
            <td>{{ $modulo->id }}</td>
            <td>{{ $modulo->nome }}</td>
            <td>{{ $modulo->disciplina->nome }}</td>
            <td><a class="btn btn-warning btn-sm" href="{{ route('modulos.editar', ['id' => $modulo->id ]) }}">Editar</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="alert alert-info" role="alert">
    Ainda não há dados inseridos
</div>
@endif
<a href="{{ route('modulos.novo') }}" class="btn btn-primary">Cadastrar novo</a>
@endsection