@extends('adminlte::page')

@section('title', 'Cadastrar nova Ata')

@section('content_header')

<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
		  <li class="breadcrumb-item"><a href="{{ route('atas.index') }}"><strong>LISTAGEM DE ATAS</strong></a></li>
            <li class="breadcrumb-item"><strong>CADASTRAR NOVA ATA</strong></li>
        </ol>
      </div>
    </div>
<br>


	
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('atas.store') }}" class="form" method="POST"  enctype="multipart/form-data" id="formID">
    			@csrf
					<input type="hidden" value="CRIACAO"  name="status">
    				@include('admin.pages.atas._partials.form')
	   		</form>
    	</div>
    </div>

@endsection