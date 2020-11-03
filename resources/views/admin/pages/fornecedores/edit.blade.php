@extends('adminlte::page')

@section('title', "Editar o fornecedor {$fornecedor->nome}")

@section('content_header')
    <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
            <li class="breadcrumb-item"><a href="{{ route('fornecedores.index') }}"><strong>LISTAGEM DE FORNECEDORES</strong></a></li>
            <li class="breadcrumb-item"><strong>EDIÇÃO DE FORNECEDOR</strong></li>
        </ol>
    </div>
</div>

<br>
    <h1>Editar o fornecedor {{ $fornecedor->nome }}</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('fornecedores.update', $fornecedor->id) }}" class="form" id="formID" method="POST">
    			@csrf
                @method('PUT')

    			@include('admin.pages.fornecedores._partials.form')
	   		</form>
    	</div>
    </div>

@endsection