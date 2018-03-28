@extends('layouts.app')
@section('cases', 'active')

@section('content')

    <div class="row" >
        <div class="col-md-12">
            <h2 class="d-inline mr-4">Casos</h2>
            <a href="{{ route('cases.create') }}" class="btn btn-primary d-inline">Agregar caso</a>
            <table id="table_id" class="display">
              <thead class="thead-dark">
                <tr>
                  <th  scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cases as $key=>$provider)
                <tr>
                  <th scope="row">{{ $key+1 }}</th>
                  <td>{{ $provider->name }}</td>
                  <td>{{ $provider->description }}</td>
                  <td>
                    <i class="material-icons" style="color:green">mode_edit</i>
                    <i class="material-icons" style="color:red">delete</i>
                  </td>
                </tr>
            </div>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>


@endsection
