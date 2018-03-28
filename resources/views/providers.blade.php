@extends('layouts.blank')
@section('title', 'Proveedores de servicios')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/blank.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}">
@endsection

@section('content')
<br><br><br>
<br>
<div class="row">
    <h2>Directorio de prooveedores de servicios de diseño</h2>
    <div class="container">
<h3>Filtros</h3>

<div id="accordion" class="row">

    <div class="col-md-auto" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Servicios
        </button>
      </h5>
    </div>
    <div class="col-md-auto" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Filtro #2
        </button>
      </h5>
    </div>
    <div class="col-md-auto" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Filtro #3
        </button>
      </h5>
    </div>

    <div class="container mt-3">
        <div id="collapseOne" class="collapse {{ $filter=='service' ? 'show':'' }}" aria-labelledby="headingOne" data-parent="#accordion">
            <small>Selecciona los servicios para ver proveedores que lo/s realizan.</small>
            <form method="post" action="{{ route('providers-list') }}">
                {{ csrf_field() }}
                <div class="row pl-1">
                    @foreach($services as $service)
                    <div class="col-md-3 col-sm-4">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="service[]" value="{{ $service->id }}" @if(is_array($checked) && in_array($service->id,$checked)) checked @endif >{{ $service->name }}
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="btn btn-info" href="#">Filtrar</button>
            </form>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <button class="btn btn-info" href="#">Filtrar</button>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <button class="btn btn-info" href="#">Filtrar</button>
        </div>
    </div>
</div>
<br>

        @if($providers->count() > 0)
        <div class="row">
            <div class="col-md-4">
            @foreach($providersLeft as $provider)
                <div class="card my-0">
                    <img class="card-img-top" src="{{ $provider->url }}" alt="{{ $provider->name }}">
                    <div class="card-body px-4">

                        <h5 class="card-title">{{ ucfirst($provider->name) }}</h5>
                        <p class="card-text">{{ $provider->description }}</p>
                            <div class="row">
                                <div class="col">
                                    <span><i class="float-left"></i><a href="{{ route('provider', $provider->id) }}" class="btn btn-primary text-center">Ver más</a></span>
                                </div>
                                <div class="col">
                                    <span class="float-right text-center">Casos <br>{{ $provider->instances()->count() }}</span>
                                </div>
                            </div>


                        <div class="card-footer px-0">
                            @foreach($provider->services()->get() as $services)
                                @foreach($services->service()->get() as $service)
                                <a href="{{ route('service',$service) }}">
                                    <span class="badge badge-success">
                                        {{ $service->name }}
                                    </span>
                                </a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
            </div>
            <div class="col-md-4">
            @foreach($providersCenter as $provider)
                <div class="card my-0">
                    <img class="card-img-top" src="{{ $provider->url }}" alt="{{ $provider->name }}">
                    <div class="card-body px-4">

                        <h5 class="card-title">{{ ucfirst($provider->name) }}</h5>
                        <p class="card-text">{{ $provider->description }}</p>
                            <div class="row">
                                <div class="col">
                                    <span><i class="float-left"></i><a href="{{ route('provider', $provider->id) }}" class="btn btn-primary text-center">Ver más</a></span>
                                </div>
                                <div class="col">
                                    <span class="float-right text-center">Casos <br>{{ $provider->instances()->count() }}</span>
                                </div>
                            </div>


                        <div class="card-footer px-0">
                            @foreach($provider->services()->get() as $services)
                                @foreach($services->service()->get() as $service)
                                <a href="{{ route('service',$service) }}">
                                    <span class="badge badge-success">
                                        {{ $service->name }}
                                    </span>
                                </a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
            </div>
            <div class="col-md-4">
            @foreach($providersRight as $provider)
                <div class="card my-0">
                    <img class="card-img-top" src="{{ $provider->url }}" alt="{{ $provider->name }}">
                    <div class="card-body px-4">

                        <h5 class="card-title">{{ ucfirst($provider->name) }}</h5>
                        <p class="card-text">{{ $provider->description }}</p>
                            <div class="row">
                                <div class="col">
                                    <span><i class="float-left"></i><a href="{{ route('provider', $provider->id) }}" class="btn btn-primary text-center">Ver más</a></span>
                                </div>
                                <div class="col">
                                    <span class="float-right text-center">Casos <br>{{ $provider->instances()->count() }}</span>
                                </div>
                            </div>


                        <div class="card-footer px-0">
                            @foreach($provider->services()->get() as $services)
                                @foreach($services->service()->get() as $service)
                                <a href="{{ route('service',$service) }}">
                                    <span class="badge badge-success">
                                        {{ $service->name }}
                                    </span>
                                </a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
            </div>
       </div>
       @else
       <p>No hay resultados para mostrar.</p>
       @endif
    </div>
</div>


@endsection

