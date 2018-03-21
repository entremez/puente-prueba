@extends('layouts.blank')
@section('css')
    <style type="text/css">
        .main-raised {
            margin: 0!important;
            border-radius: 0!important;
            box-shadow: none!important;
        }
        .espacio {
                margin-top: 80px!important;
        }
    </style>
@endsection

@section('content')
<div class="container">
<br><br><br>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card card-raised card-carousel" style="max-width: 600px">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    @foreach($instance->images  as $image => $key)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class=""></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ $instance->default_image}}" alt="">
                        <div class="carousel-caption d-none d-md-block">
                    </div>
                    </div>
                    @foreach($instance->images as $image)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $image->image}}" alt="">
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <h4>
                                <i class="material-icons">location_on</i> Yellowstone National Park, United States
                            </h4> -->
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <i class="material-icons">keyboard_arrow_left</i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <h1>{{ strtoupper($instance->name) }}</h1>
        <p>{{ $instance->description }}</p>
        <h3>Nombre empresa</h3>
        <p>{{ $instance->long_description }}</p>
        @foreach($instance->services as $service)
            @foreach($service->services as $tag)
                <span class="badge badge-success">{{ $tag->name }}</span>
            @endforeach
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <i class="material-icons" style="font-size: 40px">email</i>
        <h2>{{ $instance->provider->name }}</h2>
        <p><i class="material-icons">location_on</i> {{ $instance->provider->address }}</p>
        <p><i class="material-icons">web</i> {{ $instance->provider->web }}</p>
        <p><i class="material-icons">mail</i> {{ $instance->provider->email }}</p>
        <p><i class="material-icons">description</i> {{ $instance->provider->description }}</p>

    </div>
</div>


@endsection