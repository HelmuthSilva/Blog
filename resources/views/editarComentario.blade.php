@extends('layouts.layout')

@navegar()

@endnavegar

@foreach($comentario as $com)
<form class="container" action="update_comentario/{{$com->id}}" method="POST">

    <div class="form-group">
        <label for="titulo"> Comentário: </label>
        <textarea name="comentario" rows="5" cols="10" value="{{$com->comentario}}">
            </textarea>
    </div>

    <input type="hidden" name="nome_usuario" value="{{ $com->nome_usuario }}"/>

    <input type="hidden" name="postagem" value="{{ $com->postagem }}"/>

    <div class="form-group">
        <button type="submit" class="btn btn-success">
            Concluir
        </button>
    <div>

</form>
@endforeach

@rodape()

@endrodape