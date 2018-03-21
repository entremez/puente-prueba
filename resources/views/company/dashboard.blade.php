@extends('layouts.app')
@section('dashboard', 'active')
@section('css')
<link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
 {!! Charts::styles() !!}
@endsection

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper" class="text-center pt-0" >
                <h2 class="mt-0">Inicia el viaje</h2>
                <span class="h7">Último viaje: 01/01/2001</span><br>
                <div class="pt-3">
                    <button class="btn btn-primary btn-round">
                        <i class="fa fa-plane"></i>
                    </button>
                </div>
            <div class="row pt-4">
                <div class="col-md-6">
                     {!! $chart->html() !!}
                </div>
                <div class="col-md-6">
                    <h3>Nivel 3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>

        {!! Charts::scripts() !!}
        {!! $chart->script() !!}

@endsection
