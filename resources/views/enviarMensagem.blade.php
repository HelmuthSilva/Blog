@extends('layouts.layout')

@section('conteudo')

@navegar()

@endnavegar
    @if(session('sucesso'))
    <div class="alert alert-success" role="alert">
            {{session('sucesso')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
    @if(session('erro'))
    <div class="alert alert-danger" role="alert">
            {{session('erro')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
<form class="container" action="/mensagem" method="POST">
@csrf
    <label for="Para"> Para: </label>
    <div class="form-group">
        <input type="text" name="destinatario" placeholder="Nome do usuário ou E-mail">
    </div>

    <div class="form-group">
    <label for="mensagem"> Assunto: </label>
    <br>
        <textarea name="assunto" row="3" col="3" placeholder="Ex: Exclusão de Comentário"></textarea>
    </div>

    <div class="form-group">
    <label for="mensagem"> Mensagem: </label>
    <br>
        <textarea name="mensagem" row="3" col="3"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">
            Enviar
        </button>
    <div>

</form>

@rodape()

@endrodape

@endsection