@extends('site.layout.app')

@section('content')

<style type="text/css">


</style>

<div id="principal" class="row">
	@foreach($plans as $plan)
  <div class="col-sm-6">
    <div class="card" style="height:200px">
      <div class="card-body">
     <h2 class="card-title"><strong>{{$plan->name}}</strong></h2>
		    <p class="card-text">{{$plan->description}}</p>
        @if($plan->name === "Órgãos não participantes")
		    <a href="{{ route('plan.subscription', $plan->url) }}" class="btn btn-success ">Registrar</a>
        @else
        <button type="button" style="width:30%" class="btn btn-block btn-secondary disabled">Em construção</button>
        @endif
      </div>
    </div>
  </div>
	@endforeach
</div>

@endsection



