@extends('layouts.layout')

@section('conteudo')
<!-- Barra de navegação -->
@navegar()

@endnavegar
<!-- -->


<!-- Page Header -->
@apresentacao()

@endapresentacao
<!-- -->


<!-- Postagens -->
@foreach ($postagens as $pubs)
@postagens()
        @slot('titulo')
            {{$pubs['nomePost']}}
        @endslot

        @slot('descricao')
            {{$pubs['descricao']}}
        @endslot

        @slot('nome')
            {{$pubs['nome']}}
        @endslot

        @slot('dia')
            {{$pubs['created_at']}}
        @endslot

        @slot('id')
            {{$pubs['id']}}
        @endslot        
    @endpostagens
@endforeach
<div class="container">
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              Science has not yet mastered prophecy
            </h2>
            <h3 class="post-subtitle">
              We predict too much for the next year and yet far too little for the next ten.
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on August 24, 2019</p>
        </div>
        <hr>
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              Failure is not an option
            </h2>
            <h3 class="post-subtitle">
              Many say exploration is part of our destiny, but it’s actually our duty to future generations.
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on July 8, 2019</p>
        </div>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
<!-- -->

<!-- Rodapé -->
@rodape()

@endrodape
<!-- -->
@endsection