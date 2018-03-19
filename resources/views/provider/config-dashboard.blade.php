@extends('layouts.blank')
@section('dashboard', 'active')
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
<div class="espacio">
    <h2>Completa tu perfil</h2>
    <form class="contact-form" method="post" action="{{ url('/provider/dashboard') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ old('web', $data->name) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Dirección</label>
                    <input type="text" name="address" class="form-control" value="{{ old('web', $data->address) }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Página Web</label>
                    <input type="text" name="web" class="form-control" value="{{ old('web', $data->web) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('web', $data->phone) }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleMessage" class="bmd-label-floating">Cuéntanos de tus servicios</label>
            <textarea type="textarea" name="description" class="form-control" rows="4" id="exampleMessage"></textarea>
        </div>
        <div class="row">
            <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised">
                    Send Message
                </button>
            </div>
        </div>
    </form>
</div>


@endsection
