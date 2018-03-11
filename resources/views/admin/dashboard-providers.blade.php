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
                  <th scope="col">#</th>
                  <th scope="col">Rut</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
                @foreach($providers as $provider)
                <tr>
                  <th scope="row">{{ $provider->id }}</th>
                  <td>{{ $provider->rut }}-{{ $provider->dv_rut }}</td>
                  <td>{{ $provider->name }}</td>
                  <td>{{ $provider->address }}</td>
                  <td>
                    <a href="#" class="badge badge-success">Success</a>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
