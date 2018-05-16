@extends('layouts.puente')
@section('title','Encuestas')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Encuentas</li>
</ol>
<div class="container">
    @if(Session::has( 'success' ))
            <div class="alert alert-success">
                <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    {{ Session::get( 'success' ) }}
                </ul>
            </div>
    @endif
    <a href="{{ route('surveys.create') }}" class="btn btn-primary">Crear Encuesta</a>
    <div class="row">
            <div class="col-md-12">
                <h3>Encuestas</h3>
                <table id="table_id" class="display">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Descripción</th>
                      <th scope="col">Preguntas</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($surveys as $key=>$survey)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $survey->name }}</td>
                        <td>{{ $survey->description }}</td>
                        <td>{{ $survey->survey_questions()->get()->count() }}</td>
                        <td>
                            <a href="{{ route('surveys.edit', $survey->id ) }}">editar</a>
                            <a href="{{ route('surveys.show', $survey->id ) }}">ver+</a>
                            <form method="POST" action="{{ route('surveys.destroy', $survey->id) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button>-</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
    </div>
</div>
@endsection