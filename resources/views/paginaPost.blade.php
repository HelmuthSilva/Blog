@extends('layouts.layout')

@navegar()

@endnavegar


@postagemCompleta([
        'titulo' => '{{$pubs->titulo}}', 
        'descricao' =>'{{$pubs->descricao}}',
        'nome' => '{{$pubs->autor}}',
        'data' => '{{$pubs->dia}}',
        'texto' => '{{$pubs->texto}}',
        'id' => '{{$pubs->id}}'
        ])

@endpostagemCompleta

<h5 class="card-title">Comentários</h5>

@foreach($comentarios as $com)
@comentarios([
        'nome' => '{{$com->nome}}',
        'comentario' => '{{$con->comentario}}'
        'id' => '{{$con->id}}'
        ])

@endcomentarios
@endforeach

@rodape()

@endrodape