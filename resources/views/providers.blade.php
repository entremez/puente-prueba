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
<br><br><br>
<div class="row">
    <div class="col-md-6 ">
        <img src="{{ $provider->url }}" class="rounded mx-auto d-block img-fluid" alt="...">
    </div>
    <div class="col-md-6 text-center">
        <h1>{{ $provider->name }}</h1>
        <p>{{ $provider->description }}</p>
        <p>{{ $provider->long_description }}</p>
            <div class="row text-left">
                <div class="col-md-1"><i class="material-icons">mail_outline</i></div>
                <div class="col-md-11"><p>{{ $provider->email }}</p></div>
            </div>
            <div class="row text-left">
                <div class="col-md-1"><i class="material-icons">phone</i></div>
                <div class="col-md-11"><p>{{ $provider->phone }}</p></div>
            </div>
            <div class="row text-left">
                <div class="col-md-1"><i class="material-icons">fingerprint</i></div>
                <div class="col-md-11"><p>{{ Rut::parse($provider->rut."-".$provider->dv_rut)->format()}}</p></div>
            </div>
            <div class="row text-left">
                <div class="col-md-1"><i class="material-icons">location_on</i></div>
                <div class="col-md-11"><p>{{ $provider->address }}</p></div>
            </div>
            <div class="row text-left">
                <div class="col-md-1"><i class="material-icons">settings</i></div>
                <div class="col-md-11">
                @foreach($provider->services()->get() as $service)
                    <span class="badge badge-success">
                        {{ $service->service()->get()->first()->name }}
                    </span>
                @endforeach
                </div>
            </div>
    </div>
</div>
<br>
<div class="row">
    <h2>Casos de éxito de {{ $provider->name }}</h2>
    <div class="container">
        <div class="row">
            @foreach($cases as $case)

            <div class="col-md-4 ">
                <div class="card">
                    <img class="card-img-top" src="{{ $case->default_image }}" alt="Card image cap">
                    <div class="card-body">
                        @foreach($case->services as $services)
                                @foreach($services->services as $service)
                                <a href="{{ route('service',$service) }}">
                                    <span class="badge badge-success">
                                        {{ $service->name }}
                                    </span>
                                </a>
                                @endforeach
                        @endforeach
                        <h5 class="card-title">{{ ucfirst($case->name) }}</h5>
                        <p class="card-text">{{ $case->description }}</p>
                        <a href="{{ route('case', $case->id) }}" class="btn btn-primary text-center">Ver caso</a>
                    </div>

                </div>
                <br>
            </div>


            @endforeach
       </div>
    </div>
</div>


@endsection