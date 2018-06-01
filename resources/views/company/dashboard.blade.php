{{--
    extends('layouts.app')
@section('dashboard', 'active')
@section('css')
<link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
{!! Charts::styles() !!}
@endsection

--}}
@extends('layouts.puente')
@section('title','Dashboard')

@section('content')

@if($number_of_surveys > 0)
    <div id="page-content-wrapper" class="text-center pt-0" >
            <h2 class="mt-0">Inicia el viaje</h2>
            <span class="h7">Último viaje: {{ $last_trip }}</span><br>
            <div class="pt-3">
                <a href="{{ route('travel') }}" class="btn btn-primary btn-round">
                    <i class="material-icons">flight_takeoff</i>
                </a>
            </div>
        <div class="container">
            <div class="pt-3 text-center">
                <p>Estado actual: {{ $actual_result }}</p>
            </div>
        </div>
    </div>
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
