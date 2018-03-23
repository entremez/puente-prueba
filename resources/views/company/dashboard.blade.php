@extends('layouts.app')
@section('dashboard', 'active')
@section('css')
<link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
{!! Charts::styles() !!}
@endsection

@section('content')

@if($surveys->count() > 0)
    <div id="page-content-wrapper" class="text-center pt-0" >
            <h2 class="mt-0">Inicia el viaje</h2>
            <span class="h7">Último viaje: {{ $last_trip }}</span><br>
            <div class="pt-3">
                <button class="btn btn-primary btn-round">
                    <i class="fa fa-plane"></i>
                </button>
            </div>
        <div class="row pt-4">
            <div class="col-md-6">
                <h3>Nivel {{ $level }}</h3>
                <p>{{ $description }}</p>
            </div>
            <div class="col-md-6">
{!! Charts::assets() !!}

{!! $chart->render() !!}
            </div>
        </div>
    </div>


{!! Charts::scripts() !!}
{!! $chart->script() !!}
@else
    <h2 class="mt-0">Inicia el viaje</h2>
    <span class="h7">No tenemos nada que mostrarte aun, inicia el viaje y sigue tus resultados.</span><br>
    <div class="pt-3">
        <button class="btn btn-primary btn-round">
            <i class="fa fa-plane"></i>
        </button>
    </div>
@endif
@endsection
