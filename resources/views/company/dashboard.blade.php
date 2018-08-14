
@extends('layouts.puente')
@section('title', 'PDE | Dashboard')

@section('content')

@include('partials/menu')
<section class="company-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-8 vertical-line">
                <div class="container-progressbar">
                    <ul class="progressbar">
                              <li class="active">Registrate <br>
                              <p class="progressbar-text">Registra tu empresa para poder evaluarla. En tu perfil quedarán los registros de tus evaluaciones</p></li>
                              <li class="active">Cuestionario <br>
                              <p class="progressbar-text">Responde el cuestionario para evaluar tu empresa. No te tomará más de 5 minutos.</p></li>
                              <li class="active">Diagnostico <br>
                              <p class="progressbar-text">Después de contestar el cuestionario, se te entregará el diagnóstico de tu empresa.</p></li>
                              <li>Proveedores <br>
                              <p class="progressbar-text">En la sección de proveedores podrás buscar quien te puede ayudar con tu empresa según lo diagnosticado.</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials/footer')



