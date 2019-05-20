@extends('layouts.layout')

@section('conteudo')

@foreach($postagens as $post)
    @gerPostagem()
    @slot('titulo')
            {{$pubs['nomePost']}}
        @endslot

        @slot('descricao')
            {{$pubs['descricao']}}
        @endslot

        @slot('nome')
            {{$pubs['nome']}}
        @endslot

        @slot('dia')
            {{$pubs['created_at']}}
        @endslot

        @slot('id')
            {{$pubs['id']}}
        @endslot        
    @endgerPostagem
@endforeach

@endsection