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
   <div class="modal-dialog modal-home">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<div class="modal-title">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum porro error nemo natus, blanditiis sunt libero nihil nesciunt. Repellendus temporibus impedit, aliquam inventore reprehenderit ullam officia, odit! Suscipit, animi, est.</p>
</div>
    <div class="text-center">
      <select id="activity" class="text-center">
        @foreach($economic_activitys as $activity)
            <option value="{{ $activity->id }}" >{{ $activity->classification }}</option>
        @endforeach
      </select>
    </div>


     </div>

        <a href="#" data-dismiss="modal" class="btn btn-danger" id="modal-send">Cerrar</a>

      </div>
   </div>
</div>

@endsection