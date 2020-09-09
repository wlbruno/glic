@extends('adminlte::page')

@section('title', 'Cadastrar novo fornecedor')

@section('content_header')
    <h1>Cadastrar novo fornecedor </h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('fornecedores.store') }}" class="form" method="POST" id="formID">
    			@csrf

    		@include('admin.pages.fornecedores._partials.form')
	   		</form>
    	</div>
    </div>

@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>

var formID = document.getElementById("formID");
var send = $("#send");

$(formID).submit(function(event){
  if (formID.checkValidity()) {
    send.attr('disabled', 'disabled');
  }
});

</script>
@endsection