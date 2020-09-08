@extends('adminlte::page')

@section('title', "Editar Lote")

@section('content_header')
    <h1>Editar  {{ $lote->descricao }} </h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('lotes.update', [$ata->id, $lote->id]) }}" class="form" method="POST" id="formID">
    			@csrf
                @method('PUT')

    			  <div class="row">
                    <div class="col-sm-12">
                    
                      <div class="form-group">
                        <label for="descricao">* Descrição do lote</label>
                        <input class="form-control" required name="descricao"  value="{{$lote->descricao}}">   
                      </div>
                    </div>
                    </div>
                      <div class="card-footer">
                  <button type="submit" class="btn btn-success formButton" id="send">Salvar</button>
                  <a href="{{ route('lotes.create', $ata->id) }}" class="btn btn-danger float-right">Voltar</a>
                </div>
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

@stop