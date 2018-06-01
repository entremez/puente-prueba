@extends('layouts.puente')
@section('title', 'Puente DE')

@section('content')
<div class="menu">
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="#">Puente Diseño Empresa</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto flex-row">  <!--ml-auto alinea a derecha-->
          <li class="nav-item"> <!-- active para negritas -->
            <a class="nav-link" href="#"><i class="material-icons">account_circle</i><span class="mb-3">Inicia sesión</span></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">  <!--ml-auto alinea a derecha-->
          <li class="nav-item"> <!-- active para negritas -->
            <a class="nav-link" href="#">Evalúa tu empresa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Casos de diseño en los negocios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Proveedores de diseño</a>
          </li>
        </ul>
      </div>
    </nav>
</div>

<section class="slider-home">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="http://via.placeholder.com/800x600" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>EL DISEÑO MEJORA TU NEGOCIO</h5>
                <p>subtitulo</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="http://via.placeholder.com/800x600" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Aumenta tus ventas, enfoca tus productos y servicios en torno al usuario</h5>
                    <p>El diseño mejora tu negocio</p>
                </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="http://via.placeholder.com/800x600" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Reduce costos, orienta tus esfuerzos</h5>
                    <p>El diseño mejora tu negocio</p>
                </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="http://via.placeholder.com/800x600" alt="Fourth slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Descubre y accede a nuevos mercados</h5>
                    <p>El diseño mejora tu negocio</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<div style="clear: both;"></div>

<section class="instances">
    <div class="section-title">
        <p>Aportes del diseño en los negocios</p>
    </div>

    <div class="row" id="load-data">
        @foreach($services as $service)
            <div class="col-md-4 ">
                <div class="service">
                    <div class="image-service">
                        <img class="d-block w-100" src="http://via.placeholder.com/500x300">
                    </div>
                    <div class="footer-service">
                        <p>Diseño aplicado en {{ $service->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div id="remove-row" class="text-center">
        <form method="post" action="{{ route('welcome.load.more') }}" id="form-load-more">
            {{ csrf_field() }}
            <input type="hidden" name="type" value="service">
            <input type="hidden" name="id" value="{{ $service->id }}">
        <button id="view-more-home" class="btn btn-success" >Ver más</button>
        </form>
    </div>

</section>

<section class="plus">
    <div class="row">
        <div class="col-md-7">
            <img class="d-block w-100" src="http://via.placeholder.com/500x300">
        </div>
        <div class="col-md-5">
            <h2>¿Cuanto aporta el diseño en tu empresa?</h2>
            <p>El diseño mejora significativamente la rentabilidad de los negocios.</p>
            <p>El viaje Puente Diseño Empresa es una herramienta que te ayudará a descubrir qué nivel de diseño tiene tu empresa, te guiará en cómo puedes integrar diseño y qué tipo de diseño es el indicado para tus desafíos.</p>
        </div>
    </div>
</section>

<section class="provider">
    <div class="section-title">
        <p>Proveedores de diseño</p>
    </div>
    <div class="row" id="load-providers">
    @foreach($providers as $provider)
        <div class="col-md-4 ">
            <div>
                <div class="image-provider">
                    <img class = "image" class="d-block w-100" src="{{ $provider->logo }}">
                    <div class="middle">
                        <div class="text">{{ $provider->name }}</div>
                    </div>
                </div>
            </div>
            <div class="pb-3">

            </div>
        </div>
    @endforeach
        </div>

    <div id="remove-row-provider" class="text-center">
        <form method="post" action="{{ route('welcome.load.more') }}" id="form-providers">
            {{ csrf_field() }}
            <input type="hidden" name="type" value="provider">
            <input type="hidden" name="id" value="{{ $provider->id }}">
            <button id="view-more-providers" class="btn btn-success" >Ver más</button>
        </form>
    </div>
</section>

<footer class="footer">
    <div class="container-footer">
        <div class="row">
            <div class="col">
                <button class="btn btn-light">El proyecto</button>
                <ul>
                    <li>Ecosistema del proyecto</li>
                    <li>El equipo</li>
                    <li>Formulació</li>
                </ul>
            </div>
            <div class="col">
                <button class="btn btn-light">Reportes</button>
            </div>
            <div class="col">
                <button class="btn btn-light">Links de interés</button>
            </div>
            <div class="col">
                <button class="btn btn-light w-100">Acceso prooveedores de diseño</button>
            </div>
            <div class="col">
                <i class="material-icons">phone</i><button class="btn btn-light">
Contáctanos</button>
            </div>
        </div>
    </div>
</footer>
@endsection