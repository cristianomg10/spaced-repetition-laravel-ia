@extends('template')

@section('conteudo')
    <h1>Lista de Disciplinas</h1>

    @if(session()->has('mensagem'))
        <div class="alert alert-info">{{ session('mensagem') }}</div>
    @endif

    <div>
        @if(count($disciplinas) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->id }}</td>
                    <td>{{ $disciplina->nome }}</td>
                    <td><a class="btn btn-warning" href="{{ route('disciplinas.editar', ['id' => $disciplina->id ]) }}">Editar</a></td>
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
    <a class="btn btn-primary" href="{{ route('disciplinas.novo') }}">Novo</a>
    </div>
@endsection