@extends('layouts.puente')
@section('title','Encuestas')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('surveys.index') }}">Encuestas</a></li>
    <li class="breadcrumb-item active" aria-current="page"> {{ $survey->name}}</li>
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

    <div class="row">
            <div class="col-md-12">
                <h3>{{ $survey->name}}</h3>
                <table id="table_id" class="display">
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Tipo de pregunta</th>
                      <th>Orden</th>
                      <th>Respuestas posible</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($survey->survey_questions()->get() as $key=>$question)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $question->question()->get()->first()->question }}</td>
                        <td>{{ $question->question()->get()->first()->question_type()->get()->first()->type }}</td>
                        <td>{{ $question->order }}</td>
                        <td>{{ $question->question()->get()->first()->response_choices()->get()->count() }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
    </div>
</div>
@endsection