@extends('template')

@section('conteudo')
    <div class="row">
        <div class="col-sm-2"><a href="{{ route('disciplinas.show') }}" class="btn btn-outline-info">Disciplinas</a></div>
        <div class="col-sm-2"><a href="{{ route('modulos.show') }}" class="btn btn-outline-info">Módulos</a></div>
    </div>
@endsection