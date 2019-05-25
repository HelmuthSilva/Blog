@extends('layouts.layout')

@section('conteudo')

<form class="container" action="#" method="POST">
@csrf
    <label for="Para"> Para: </label>
    <div class="form-group">
        <input type="email" name="destinatario">
    </div>

    <div class="form-group">
    <label for="mensagem"> Mensagem: </label>
        <textarea name="mensagem" row="3" col="3">
        </textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">
            Enviar
        </button>
    <div>

</form>

@endsection