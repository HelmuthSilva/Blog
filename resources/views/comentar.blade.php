@extends('layouts.layout')

@navegar()

@endnavegar

<form class="container" action="/criar_comentario" method="POST">

    <div class="form-group">
        <label for="titulo"> Comentário: </label>
        <textarea name="comentario" rows="5" cols="10">
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