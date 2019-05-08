@extends('layouts.layout')

@section('conteudo')
@navegar()

@endnavegar


@postagemCompleta()

        @slot('titulo')
             {{$postagens->nomePost}}
        @endslot

        @slot('descricao')
             {{$postagens->descricao}}
        @endslot

        @slot('nome')
           {{$postagens->usuario}}
        @endslot

        @slot('data')
           {{$postagens->created_at}}
        @endslot

        @slot('autor')
        {{$postagens->usuario}}
        @endslot

        @slot('texto')
           {{$postagens->texto}}
        @endslot

        @slot('id')
           {{$postagens->id}}
        @endslot

@endpostagemCompleta


@rodape()

@endrodape
@endsection