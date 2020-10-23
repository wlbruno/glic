@extends('adminlte::page')

@section('title', "Editar o objeto {$objeto->nome}")

@section('content_header')
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
            <li class="breadcrumb-item"><a href="{{ route('objetos.index') }}"><strong>LISTAGEM DE OBJETOS</strong></a></li>
            <li class="breadcrumb-item"><strong>EDIÇÃO DE OBJETO</strong></li>
        </ol>
    </div>
</div>

<br>
    <h1>Editar o objeto {{ $objeto->nome }}</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('objetos.update', $objeto->id) }}" class="form" id="formID" method="POST">
    			@csrf
                @method('PUT')

    			@include('admin.pages.objetos._partials.form')
	   		</form>
    	</div>
    </div>

@endsection