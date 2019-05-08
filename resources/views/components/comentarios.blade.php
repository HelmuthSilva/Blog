<div class="card" style="width: 18rem;">
  <div class="card-body">
    <!--<h5 class="card-title">Comentários</h5> -->
    <h6 class="card-subtitle mb-2 text-muted">{{$nome}}</h6>
        <p class="card-text">
            {{$comentario}}
        </p>
    <a href="/editar_comentario/{{$id}}" class="btn btn-warning">Editar</a>
    <a href="/excluir_comentario/{{$id}}" class="btn btn-danger">Excluir</a>
  </div>
</div>