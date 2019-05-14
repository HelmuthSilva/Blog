<div class="container">
<div class="col-lg-8 col-md-10 mx-auto">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <!--<h5 class="card-title">Comentários</h5> -->
    <h6 class="card-subtitle mb-2 text-muted">{{$nome}} em {{$hr}}</h6>
        <p class="card-text">
            {{$comentario}}
        </p>

    <div type="hidden" value="{{$autorPub}}"></div>
    <div type="hidden" value="{{$autP}}"></div>
  @if (Route::has('login'))
  @auth
  @if($nome == Auth::user()->name)
    <a href="/editar_comentario/{{$id}}" class="btn btn-warning">Editar</a>
    <a href="/excluir_comentario/{{$id}}" class="btn btn-danger">Excluir</a>
    @elseif($autorPub == Auth::user()->name)
    <a href="/excluir_comentario/{{$id}}" class="btn btn-danger">Excluir</a>
    @endif
    @endauth
    @endif
  </div>
</div>
</div>
</div>