@extends('layouts.puente')
@section('title','Respuestas')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Encuentas</li>
    <li class="breadcrumb-item active" aria-current="page">Respuestas</li>
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
                <h3>Respuestas a pregunta: {{ $responses->first()->question()->get()->first()->question }}</h3>
<!--                 <form method="get" action="{{ route('response_choices.create') }}"> -->
                    <input type="hidden" name="question" value="{{ $responses->first()->question()->get()->first()->id }}">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Agregar respuesta</button>
<!--                 </form> -->
                <table class="table mt-3">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Respuesta</th>
                      <th scope="col">Peso</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($responses as $key=>$response)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $response->response }}</td>
                        <td>{{ $response->weight }}</td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar respuesta a {{ $responses->first()->question()->get()->first()->question }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{ route('questions.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="survey" value="">
                <div class="form-group">
                    <label for="question">Pregunta</label>
                    <input type="text" class="form-control" id="question" placeholder="Pregunta" name="question" value="{{ old('question') }}">
                </div>
                <div class="form-group">
                    <label for="description">Tipo de pregunta</label>
                    <select class="custom-select" name="type">
                        <option selected>Seleccionar</option>
                        @foreach(App\QuestionType::get() as $type)
                        <option value="{{ $type->id }}" {{ (old('type') == $type->id ? 'selected':'') }}>{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>