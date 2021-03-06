
@extends('layouts.puente')
@section('title', 'Proveedores de diseño')

@section('content')

@include('partials/menu')


<section class="banner-title">
    <div class="title">
        <h2>Proveedores de servicios de diseño</h2>
    </div>
</section>

<section class="filters">
    <div class="container">
        <div class="row">
            <h4>¿Qué servicio de diseño necesitas?</h4>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3">
                    <div class="service">
                        <h3>{{ $category->name }}</h3>
                        <ul>
                            @foreach($services as $service)
                                @if($service->category_id == $category->id)
                                    <li id="service" data-id="{{ $service->id }}"><a href="{{ route('providers-list', $service->id) }}" class="service-filter">{{ $service->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<form method="post" action="{{ route('providers-list-filtered', ':SERVICE_ID') }}" id="form-filter">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

<section class="results" id="results">
    <div class="container">
        <div class="row">
            @foreach($providers as $provider)
                <div class="col-md-3">
                    <a href="{{ route('provider', $provider->id) }}">
                        <img class="img-fluid w-100-h-200 image-provider" src="{{ $provider->getUrlAttribute() }}" alt="{{ $provider->id }}">
                        <div class="middle-provider">
                                <div class="text-provider">{{ $provider->name }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>



@include('partials/footer')

@endsection

