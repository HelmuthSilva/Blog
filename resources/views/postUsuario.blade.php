@extends('layouts.layout')


@navegar()

@endnavegar


@foreach($postagens as $pubs)
    @postagens([
        'titulo' => '{{$postagens->titulo}}', 
        'descricao' =>'{{$postagens->descricao}}',
        'nome' => '{{$postagens->autor}}'',
        'dia' => '{{$postagens->dia}}'])

        
    @endpostagens
@endforeach

@rodape()

@endrodape