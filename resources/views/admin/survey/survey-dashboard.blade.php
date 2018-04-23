@extends('layouts.app')
@section('survey', 'active')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Encuentas</li>
</ol>
    <div class="row">
        <div class="btn btn-primary">Crear Encuesta</div>
    </div>
</div>
@endsection
