@extends('layouts.layout')

@navegar()

@endnavegar


@postagemCompleta([
        'titulo' => '{{$pubs->titulo}}', 
        'descricao' =>'{{$pubs->descricao}}',
        'nome' => '{{$pubs->autor}}',
        'data' => '{{$pubs->dia}}',
        'texto' => '{{$pubs->texto}}'])



@endpostagemCompleta


@rodape()

@endrodape