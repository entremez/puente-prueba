@extends('layouts.blank')
@section('dashboard', 'active')
@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('css/blank.css') }}">

@endsection

@section('content')
<div class="espacio">
    <h2>Agregar un caso de éxito</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    <form class="contact-form" method="POST" action="{{ url('/provider/dashboard') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>

                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    <small>Utiliza un nombre de fantasía para el caso</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Nombre empresa</label>
                    <input type="text" name="company_name" class="form-control" value="{{ old('address') }}" required>
                    <small>Nombre de la empresa donde se llevó a cabo el caso</small>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleMessage" class="bmd-label-floating">Cuéntanos en una frase de que se trata el caso</label>
            <input type="text" name="description" class="form-control" rows="4" id="exampleMessage" value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <label for="exampleMessage" class="bmd-label-floating">Cuéntanos con mas detalle el caso</label>
            <textarea type="textarea" name="description" class="form-control" rows="4" id="exampleMessage">{{ old('description') }}</textarea>
        </div>

        <div class="row pt-5">
            <div class="col-md-4 ml-auto mr-auto text-center">
                <label class="fileContainer">
                    <button type="button" class="btn btn-success"><i class="material-icons">add_a_photo</i> Selecciona imágenes que representen el caso <input type="file" name="images[]" required multiple></button>
                    <ul id="file">Máximo 4</ul>
                </label>
            </div>
        </div>
        <ul>

        </ul>

            <h4>Selecciona a que servicio de los que prestas pertenece este caso de éxito</h4>
        <div class="row">

            @foreach($services as $service)
            <div class="col-md-3 col-sm-4">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="service[]" value="{{ $service->id }}" @if(is_array(old('service')) && in_array($service->id,old('service'))) checked @endif >{{ $service->name }}
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <div class="row">
            <div class="col-md-4 ml-auto mr-auto text-center">
                <button type="submit" class="btn btn-primary btn-raised">
                    Enviar
                </button>
            </div>
        </div>
    </form>
</div>




@endsection
