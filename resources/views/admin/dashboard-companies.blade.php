@extends('layouts.app-admin')
@section('company', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Empresas</h2>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Rut</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($companies as $company)
                <tr>
                  <th scope="row">{{ $company->id }}</th>
                  <td>{{ $company->rut }}-{{ $company->dv_rut }}</td>
                  <td>{{ $company->name }}</td>
                  <td>{{ $company->address }}</td>
                  <td>
                    <span class="badge badge-success">&nbsp</span>
                    <span data-feather="user"></span>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
