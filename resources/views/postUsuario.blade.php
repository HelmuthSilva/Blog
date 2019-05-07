@extends('layouts.layout')


@navegar()

@endnavegar


@foreach($postagens as $pubs)
    @postagens([
        'titulo' => '{{$pubs->titulo}}', 
        'descricao' =>'{{$pubs->descricao}}',
        'nome' => '{{$pubs->autor}}',
        'dia' => '{{$pubs->dia}}',
        'id' => '{{$pubs->id}}'])

        
    @endpostagens
@endforeach

@rodape()

@endrodape