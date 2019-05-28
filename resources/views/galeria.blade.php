@extends('layouts.layout')

@section('conteudo')
    @navegar()
    @endnavegar

    <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
@foreach($postagens as $posts)
    @galeria()
        @slot('imagemPost')
            {{$posts->id}}
        @endslot

        @slot('imagem')
            {{$posts->imagem}}
        @endslot

    @endgaleria
@endforeach
            </div>
        </div>
    </div>

    @rodape()
    @endrodape
@endsection
