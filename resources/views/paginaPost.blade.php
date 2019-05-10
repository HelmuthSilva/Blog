@extends('layouts.layout')

@section('conteudo')
@navegar()

@endnavegar


@postagemCompleta()

        @slot('imagem')
            {{$postagens->imagem}}
        @endslot

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

@foreach($comentarios as $com)
@comentarios()
    @slot('nome')
        {{$com->nome_usuario}}
    @endslot

    @slot('comentario')
        {{$com->texto_comentario}}
    @endslot

    @slot('id')
        {{$com->id}}
    @endslot

    @slot('autorPub')
        {{$usuario}}
    @endslot

    @slot('autP')
        {{$postagens->usuario}}
    @endslot

@endcomentarios
@endforeach



@rodape()

@endrodape
@endsection