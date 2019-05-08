@extends('layouts.layout')


@navegar()

@endnavegar

@foreach($postagens as $pubs)
    @postagens()
        @slot('titulo')
            {{$pubs->nomePost}}
        @endslot

        @slot('descricao')
            {{$pubs->descricao}}
        @endslot

        @slot('nome')
            {{$pubs->usuario}}
        @endslot

        @slot('dia')
            {{$pubs->created_at}}
        @endslot

        @slot('id')
            {{$pubs->id}}
        @endslot        
    @endpostagens
@endforeach

@rodape()

@endrodape