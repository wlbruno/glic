@extends('site.layout.app')

@section('content')
<div class="row">
	@foreach($plans as $plan)
	<div class="col-md-4">
		<div class="card" style="width: 18rem;">
			<div class="card-body">
    			<h5 class="card-title">{{$plan->name}}</h5>
    			<p class="card-text">{{$plan->description}}</p>
    			 <a href="{{ route('plan.subscription', $plan->url) }}">Registrar</a>
  			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection