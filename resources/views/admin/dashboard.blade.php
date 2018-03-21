@extends('layouts.app')
@section('dashboard', 'active')

@section('content')

<br><br><br>
<div class="row py-3 pl-0" style="background-color: #D9CBCB">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-6 text-right pr-0 pt-4">
                <i class="material-icons mr-3">supervisor_account</i><br>
                <small>Empresas</small>
            </div>
            <div class="col-md-6 pl-1">
                <h1>{{ $companies }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-6 text-right pr-0 pt-4">
                <i class="material-icons mr-4">person</i><br>
                <small>Proveedores</small>
            </div>
            <div class="col-md-6 pl-1">
                <h1>{{ $providers }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-6 text-right pr-0 pt-4">
                <i class="material-icons mr-2">attach_file</i><br>
                <small>Casos</small>
            </div>
            <div class="col-md-6 pl-1">
                <h1>{{ $cases }}</h1>
            </div>
        </div>
    </div>
</div>


@endsection
