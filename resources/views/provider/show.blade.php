@extends('layouts.app')
@section('cases', 'active')
@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('css/blank.css') }}">

@endsection

@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('provider.dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('cases.index') }}">Administrar casos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalle</li>
</ol>

<div class="row">
    <div class="col-md-5">
        <div class="card card-raised card-carousel" style="max-width: 600px">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($instance->images  as $key => $image)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $image->featured == 1 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($instance->images as $image)
                    <div class="carousel-item {{ $image->featured == 1 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ $image->url}}" alt="">
                        <div class="carousel-caption d-none d-md-block">
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
        <h3>{{ $instance->company_name }}</h3>
        <p>{{ $instance->long_description }}</p>
        @foreach($instance->services as $service)
            @foreach($service->services as $tag)
                <span class="badge badge-success">{{ $tag->name }}</span>
            @endforeach
        @endforeach
    </div>
</div>

@endsection
