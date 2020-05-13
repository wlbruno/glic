@extends('adminlte::page')

@section('title', "Editar o objeto {$objeto->nome}")

@section('content_header')
    <h1>Editar o objeto {{ $objeto->nome }}</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('objetos.update', $objeto->id) }}" class="form" method="POST">
    			@csrf
                @method('PUT')

    			@include('admin.pages.objetos._partials.form')
	   		</form>
    	</div>
    </div>

@endsection