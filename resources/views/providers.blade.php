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
    <h2>Directorio de prooveedores de serivios de diseño</h2>
    <div class="container">
        <div class="row">
            @foreach($providers as $provider)

            <div class="col-md-4 ">
                <div class="card">
                    <img class="card-img-top" src="{{ $provider->logo }}" alt="{{ $provider->name }}">
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
            </div>


            @endforeach
       </div>
    </div>
</div>


@endsection

