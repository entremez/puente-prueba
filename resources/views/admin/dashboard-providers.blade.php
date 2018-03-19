@extends('layouts.app-admin')
@section('provider', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Proveedores</h2>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th  scope="col">#</th>
                  <th scope="col">Rut</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">WEB</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($providers as $provider)
                <tr>
                  <th scope="row">{{ $provider->id }}</th>
                  <td>{{ $provider->rut }}-{{ $provider->dv_rut }}</td>
                  <td>{{ $provider->name }}</td>
                  <td>{{ $provider->address }}</td>
                  <td>{{ $provider->phone }}</td>
                  <td>{{ $provider->web }}</td>
                  <td>{{ $provider->description }}</td>
                  <td>
                    <i class="fa {{ $provider->approved ? 'fa-eye' : 'fa-eye-slash'}} h4"></i>
                    <a  data-toggle="modal" data-target="#{{ $provider->id }}">
                      <i class="fa fa-info-circle h4" style="color:yellow"></i>
                    </a>
                    <i class="fa fa-pencil-alt h4" style="color:green"></i>
                    <i class="fa fa-trash h4" style="color:red"></i>
                  </td>
                </tr>
                <div class="modal fade" id="{{ $provider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $provider->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>{{ $provider->id }}</p>
                    <p>{{ $provider->rut }}-{{ $provider->dv_rut }}</p>
                    <p>{{ $provider->name }}</p>
                    <p>{{ $provider->address }}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>



</div>
@endsection
