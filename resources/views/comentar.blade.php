@extends('layouts.layout')

@navegar()

@endnavegar

<form class="container" action="/criar_comentario" method="POST">
@csrf
    <label for="titulo"> Comentário: </label>
    <div class="form-group">
        <textarea name="comentario" rows="3" cols="30">
       </textarea>
    </div>

    <input type="hidden" name="postagem" value="{{ $id }}"/>

    <div class="form-group">
        <button type="submit" class="btn btn-info">
            Comentar
        </button>
    <div>

</form>

@rodape()

@endrodape