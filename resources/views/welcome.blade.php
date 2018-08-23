@extends('layouts.puente')
@section('title', 'Puente DE')

@section('content')

@include('partials/menu')

@include('partials/home/slider')

@include('partials/home/instances')

@include('partials/home/banner')

@include('partials/home/columns')

@include('partials/footer')


<div class="modal fade" id="modal-setting" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    <p>Para entregarte una mejor experiencia, cuentanos tu rubro para ajustarnos a tus preferencias.</p>

    <select id="activity">
        @foreach($economic_activitys as $activity)
            <option value="{{ $activity->id }}" >{{ $activity->name }}</option>
        @endforeach
    </select>


     </div>

        <a href="#" data-dismiss="modal" class="btn btn-danger" id="modal-send">Cerrar</a>

      </div>
   </div>
</div>

@endsection