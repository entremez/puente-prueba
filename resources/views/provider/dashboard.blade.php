@extends('layouts.app')
@section('dashboard', 'active')

@section('content')

<div class="container">
        <br>
        <div class="row">
            <div class="col-md-4 ">
                <img src="{{ $data->url }}" class="rounded mx-auto d-block img-fluid" style="width: 250px;" alt="...">
            </div>
            <div class="col-md-4 text-center">
                <h1>{{ $data->name }}</h1>
            </div>
            <div class="col-md-4 text-left">
                <div class="row">
                    <div class="col-md-2"><i class="material-icons">mail_outline</i></div>
                    <div class="col-md-10"><p>{{ $user->email }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><i class="material-icons">phone</i></div>
                    <div class="col-md-10"><p>{{ $user->phone }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><i class="material-icons">fingerprint</i></div>
                    <div class="col-md-10"><p>{{ Rut::parse($data->rut."-".$data->dv_rut)->format()}}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><i class="material-icons">location_on</i></div>
                    <div class="col-md-10"><p>{{ $data->address }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><i class="material-icons">settings</i></div>
                    <div class="col-md-10">
                    @foreach($services as $service)
                        <span class="badge badge-success">
                            {{ $service->service()->get()->first()->name }}
                        </span>
                    @endforeach
                    </div>
                </div>
            </div>
    </div>
</div>


@endsection
