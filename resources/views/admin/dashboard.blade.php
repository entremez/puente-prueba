@extends('layouts.app')
@section('dashboard', 'active')

@section('css')
  {!! Charts::styles() !!}
@endsection

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
</ol>
<div class="row pb-3 pl-0 text-center">
    <div class="col-md-3">
        <div class="row ">
            <div class="col-md-6 text-right pr-0 pt-4">
                <i class="material-icons mr-3">supervisor_account</i><br>
                <small>Empresas</small>
            </div>
            <div class="col-md-6 pl-1">
                <h1>{{ $companies->count() }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-6 text-right pr-0 pt-4">
                <i class="material-icons mr-4">person</i><br>
                <small>Proveedores</small>
            </div>
            <div class="col-md-6 pl-1">
                <h1>{{ $providers->where('approved','=',true)->count() }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-6 text-right pr-0 pt-4">
                <i class="material-icons mr-2">attach_file</i><br>
                <small>Casos</small>
            </div>
            <div class="col-md-6 pl-1">
                <h1>{{ $cases->count() }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row text-center">
            <div class="col-md-6 text-right pr-0 pt-4">
                <i class="material-icons mr-2">warning</i><br>
                <small class="">Solicitudes</small>
            </div>
            <div class="col-md-6 pl-1">
                <h1>{{ $providers->where('status','=','1')->count() }}</h1>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
{!! $chart->html() !!}
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}

@endsection
