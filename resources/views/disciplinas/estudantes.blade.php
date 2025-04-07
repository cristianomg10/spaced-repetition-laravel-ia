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
                    <a class="btn btn-danger btn-sm" href="#">Excluir</a>
                </td>
            </tr>
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