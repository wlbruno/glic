@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
              	@foreach ($errors->all() as $error)
		
			<p>{{ $error }}</p>
		@endforeach
                </div>
	
@endif

@if (session('messeger'))
<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
	{{ session('messeger') }}
</div>

@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
	{{ session('error') }}
</div>

@endif