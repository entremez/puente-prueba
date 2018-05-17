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
                <div class="row mb-3">
                    <h3>{{ $survey->name}}  </h3>
                    <form method="get" action="{{ route('questions.create', $survey->id) }}">
                        <input type="hidden" name="survey" value="{{ $survey->id}}">
                        <button class="btn btn-primary ml-3">Agregar pregunta</button>
                    </form>
                </div>
                <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>Pregunta</th>
                      <th>Tipo de pregunta</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($survey->survey_questions()->orderBy('order')->get() as $key=>$question)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            {{ $question->question()->get()->first()->question }}
                            <br>
                            @if($question->question()->get()->first()->response_choices()->get()->count()>0)
                                <table class="table mt-3">
                                    <thead class="thead-dark">
                                        <tr>
                                          <th>#</th>
                                          <th>Respuesta</th>
                                          <th>Peso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($question->question()->get()->first()->response_choices()->get() as $key2=>$response)
                                    <tr>
                                        <td>{{ $key2+1 }}</td>
                                        <td>{{ $response->response }}</td>
                                        <td>{{ $response->weight }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            @endif
                            <form method="get" action="{{ route('response_choices.index', $survey->id) }}">
                                <input type="hidden" name="question" value="{{ $question->first()->question()->get()->first()->id}}">
                                <button class="btn btn-info">
                                    @if($question->question()->get()->first()->response_choices()->get()->count()>0)
                                        Agregar o gestionar respuestas
                                    @else
                                        Agregar respuestas
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td>{{ $question->question()->get()->first()->question_type()->get()->first()->type }}</td>
                        <td>&%$</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
    </div>
</div>
@endsection