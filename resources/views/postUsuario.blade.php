@extends('layouts.layout')


@section('conteudo')
@navegar()

@endnavegar


@foreach($postagens as $pubs)
@if($pubs->usuario == Auth::user()->id)
    @postagensP()
        @slot('titulo')
            {{$pubs->nomePost}}
        @endslot

        @slot('descricao')
            {{$pubs->descricao}}
        @endslot
        
        @slot('dia')
            {{$pubs->created_at}}
        @endslot

        @slot('id')
            {{$pubs->id}}
        @endslot        
    @endpostagensP
@endif
@endforeach

@rodape()

@endrodape
@endsection