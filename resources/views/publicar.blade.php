@extends('layouts.layout')

@section('conteudo')
@navegar()

@endnavegar
    <form class="container" action="store_postagem" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="titulo"> Título: </label>
                <input type="text" name="titulo"/>
        </div>

        <input type="hidden" name="autor" value="{{ Auth::user()->name }}"/>

        <div class="form-group">
            <label for="descricao"> Descrição: </label>
                <input type="text" name="descricao"/>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem: </label>
                <input type="file" name="imagem"/>
        </div>

        <label for="texto"> Seu texto: </label>
        <div class="form-group">
                <textarea name="texto" rows="30" cols="50">

                </textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Publicar
            </button>
        <div>

    </form>
@rodape()

@endrodape
@endsection