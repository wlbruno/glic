@extends('adminlte::page')

@section('title', "Editar a ata {$ata->nata}")

@section('content_header')
    <h1>Editar a ata  {{ $ata->nata }}</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('atas.update', $ata->id) }}" class="form" method="POST">
    			@csrf
                @method('PUT')
				<input type="hidden" value="{{ $ata->status }}"  name="status">
    			@include('admin.pages.atas._partials.form')
	   		</form>
    	</div>
    </div>

@endsection