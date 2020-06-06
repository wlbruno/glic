@extends('site.layout.app')

@section('content')

<style type="text/css">


</style>

<div id="principal" class="row">
	@foreach($plans as $plan)
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
   <h5 class="card-title">{{$plan->name}}</h5>
		    <p class="card-text">{{$plan->description}}</p>
		    <a href="{{ route('plan.subscription', $plan->url) }}" class="btn btn-success ">Registrar</a>
      </div>
    </div>
  </div>
	@endforeach
</div>

@endsection



