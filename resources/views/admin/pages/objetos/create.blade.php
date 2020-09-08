@extends('adminlte::page')

@section('title', 'Cadastrar novo objeto')

@section('content_header')
    <h1>Cadastrar novo objeto </h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('objetos.store') }}" class="form" method="POST" id="formID">
    			@csrf
    		@include('admin.pages.objetos._partials.form')
	   		</form>
    	</div>
    </div>

@endsection