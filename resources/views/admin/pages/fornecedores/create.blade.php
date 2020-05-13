@extends('adminlte::page')

@section('title', 'Cadastrar novo fornecedor')

@section('content_header')
    <h1>Cadastrar novo fornecedor </h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('fornecedores.store') }}" class="form" method="POST">
    			@csrf

    		@include('admin.pages.fornecedores._partials.form')
	   		</form>
    	</div>
    </div>

@endsection