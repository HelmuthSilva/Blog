@extends('layouts.layout')

@section('conteudo')

@navegar()

@endnavegar
<form class="container" action="#" method="#">
@csrf
    <label for="Para"> Para: </label>
    <div class="form-group">
        <input type="email" name="destinatario">
    </div>

    <div class="form-group">
    <label for="mensagem"> Mensagem: </label>
    <br>
        <textarea name="mensagem" row="3" col="3">
        </textarea>
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