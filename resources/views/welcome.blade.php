@extends('layouts.home')
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
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 text-center">
                <h2>Casos</h2>
                <h4 class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($cases as $case)

            <div class="col-md-4 ">
                <div class="card">
                    <img class="card-img-top" src="{{ $case->default_image }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $case->id }}|{{ $case->name }}</h5>
                        <p class="card-text">{{ $case->description }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>

                </div>
                <br>
            </div>


            @endforeach
       </div>
       <div class="text-center"><a href="#" class="btn btn-primary">Ver más</a></div>
    </div>
</div>
<hr>
<div class="container text-center">
    <h2>¿Y tú, usas diseño?</h2>
    <a href="#" class="btn btn-success">Comienza el viaje</a>
</div>



@endsection