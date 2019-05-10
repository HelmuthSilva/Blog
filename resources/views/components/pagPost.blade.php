  <!-- Page Header -->
  <header class="masthead" style="background-image: url('/storage/{{$imagem}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$titulo}}</h1>
            <h2 class="subheading">{{$descricao}}</h2>
            <span class="meta">Postado por:
              <a href="#">{{$autor}}</a>
              {{$data}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            {{$texto}}
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <a href="/comentar/{{$id}}" class="btn btn-dark"> Comentar </a>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <h5 class="card-title">Comentários</h5>
        </div>
      </div>
    </div>

  </article>