@extends('layouts.layout')

@section('conteudo')
@navegar()

@endnavegar

<form class="container" action="/update_comentario/{{$comentario->id}}" method="POST">
@csrf
    <div class="form-group">
        <label for="titulo"> Comentário: </label>
        <textarea name="comentario" rows="5" cols="10" value="{{$comentario->texto_comentario}}">
            </textarea>
    </div>

    <input type="hidden" name="nome_usuario" value="{{ $comentario->nome_usuario }}"/>

    <input type="hidden" name="postagem" value="{{ $comentario->postagem }}"/>

    <div class="form-group">
        <button type="submit" class="btn btn-success">
            Concluir
        </button>
    <div>

</form>

@rodape()

@endrodape
@endsection