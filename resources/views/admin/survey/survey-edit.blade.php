@extends('layouts.puente')
@section('title','Editar encuesta')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('surveys.index') }}">Encuestas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar encuesta</li>
</ol>

<div class="container">
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
    <form method="POST" action="{{ route('surveys.update', $survey->id) }}">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nombre de la encuesta</label>
            <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{ old('name', $survey->name) }}">
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" class="form-control" id="description" placeholder="Encuesta creada para evaluar..." name="description" value="{{ old('description', $survey->description) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
