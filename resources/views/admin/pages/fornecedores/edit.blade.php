@extends('adminlte::page')

@section('title', "Editar o fornecedor {$fornecedor->nome}")

@section('content_header')
    <h1>Editar o fornecedor {{ $fornecedor->nome }}</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('fornecedores.update', $fornecedor->id) }}" class="form" method="POST">
    			@csrf
                @method('PUT')

    			@include('admin.pages.fornecedores._partials.form')
	   		</form>
    	</div>
    </div>

@endsection