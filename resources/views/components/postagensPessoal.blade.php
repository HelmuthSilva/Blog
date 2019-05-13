@if (Route::has('login'))
@auth
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <a href="/ver_post/{{$id}}">
            <h2 class="post-title">
              {{$titulo}}
            </h2>
            <h3 class="post-subtitle">
              {{$descricao}}
            </h3>
          </a>
          <p class="post-meta">Postado por
            <a href="#">{{Auth::user()->name}}</a>
            em {{$dia}}</p>
        </div>
        <hr>
@endauth
@endif
        <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-warning" href="editar_postagem/{{$id}}">Editar Postagem</a>
            <a class="btn btn-danger" href="/excluir_postagem/{{$id}}">Excluir Postagem</a>
          </div>
      </div>
    </div>
  </div>

  <hr>