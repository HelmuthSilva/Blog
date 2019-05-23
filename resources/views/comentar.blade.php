@extends('layouts.layout')

@section('conteudo')
@navegar()

@endnavegar

<form class="container" action="/criar_comentario" enctype="multipart/form-data" method="POST">
@csrf
    <label for="titulo"> Comentário: </label>
    <div class="form-group">
        <textarea name="comentario" rows="3" cols="30">
       </textarea>
    </div>

    <div class="form-group">
            <label for="imagem">Imagem: </label>
            <input type="file" name="imagem"/>
    </div>

    <input type="hidden" name="postagem" value="{{ $postagens->id }}"/>

    <div class="form-group">
        <button type="submit" class="btn btn-info">
            Comentar
        </button>
    <div>

</form>

@rodape()

@endrodape
@endsection