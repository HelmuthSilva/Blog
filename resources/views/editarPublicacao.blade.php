@extends('layouts.layout')

@navegar()

@endnavegar
    <form class="container" action="/update_postagem/{{$postagem->id}}" method="POST">
        <div class="form-group">
            <label for="titulo"> Título: </label>
                <input type="text" name="titulo" value="{{$postagem->nomePost}}">
        </div>

        <input type="hidden" name="autor" value="{{ Auth::user()->name }}"/>

        <div class="form-group">
            <label for="descricao"> Descrição: </label>
                <input type="text" name="descricao" value="{{$postagem->descricao}}"/>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem: </label>
                <input type="file" name="imagem" value="{{$postagem->imagem}}"/>
        </div>

        <label for="texto"> Seu texto: </label>
        <div class="form-group">
                <textarea name="texto" rows="30" cols="50" value="{{$postagem->texto}}">

                </textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                Editar
            </button>
        <div>

    </form>
@rodape()

@endrodape