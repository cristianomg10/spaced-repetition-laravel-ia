@extends('template')

@section('conteudo')
    <h1>Lista de Estudantes</h1>

    @if(session()->has('mensagem'))
        <div class="alert alert-info">{{ session('mensagem') }}</div>
    @endif

    <div>
        @if(count($estudantes) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudantes as $estudante)
                <tr>
                    <td>{{ $estudante->id }}</td>
                    <td>{{ $estudante->nome }}</td>
                    <td>{{ $estudante->matricula }}</td>
                    <td><a class="btn btn-warning btn-sm" href="{{ route('estudantes.editar', ['id' => $estudante->id ]) }}">Editar</a></td>
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
    <a class="btn btn-primary" href="{{ route('estudantes.novo') }}">Novo</a>
    </div>
@endsection