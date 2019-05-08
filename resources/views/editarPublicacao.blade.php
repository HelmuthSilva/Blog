@extends('layouts.layout')

@navegar()

@endnavegar
@foreach($postagem as $pubs)
    <form class="container" action="/update_postagem/{{$pubs->id}}" method="POST">
        <div class="form-group">
            <label for="titulo"> Título: </label>
                <input type="text" name="titulo" value="{{$pubs->titulo}}"/>
        </div>

        <input type="hidden" name="autor" value="{{ Auth::user()->name }}"/>

        <div class="form-group">
            <label for="descricao"> Descrição: </label>
                <input type="text" name="descricao" value="{{$pubs->descricao}}"/>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem: </label>
                <input type="file" name="imagem" value="{{$pubs->imagem}}"/>
        </div>

        <label for="texto"> Seu texto: </label>
        <div class="form-group">
                <textarea name="texto" rows="30" cols="50" value="{{$pubs->texto}}">

                </textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                Publicar
            </button>
        <div>

    </form>
@endforeach
@rodape()

@endrodape