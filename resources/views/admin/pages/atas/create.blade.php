@extends('adminlte::page')

@section('title', 'Cadastrar nova Ata')

@section('content_header')

    <h1>Cadastrar Nova Ata </h1>
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