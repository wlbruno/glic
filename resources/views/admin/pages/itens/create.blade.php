@extends('adminlte::page')

@section('title', 'Cadastrar nova Item')

@section('content_header')
@if(count($ata->lotes) == 0)
    <h1>Cadastrar novo Item </h1>
   @else
   <h1>Cadastrar novo item ao {{$lote->descricao}}</h1>
   @endif

@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		
    <div class="card">
    	<div class="card-body">
  		   <div class="card-header border-transparent">
               
	  <div class="card-tools">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-fornecedor">Criar Fornecedor</button>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-objeto">Criar Objeto</button>
                  </div>
                 </div>

	    		<form action="{{ route('itens.store', [$ata->id, $lote->id]) }}" class="form" method="POST" id="formID">
	    			@csrf
	    			<div class="row">
					  <div class="col-md-6">
					      @if(count($ata->lotes) == 0)
					        <div class="form-group"> 
					          <label for="descricao">Descrição</label>
					            <input type="text" class="form-control" name="descricao" required="">
					        </div>
					      @else
					        <input type="hidden" name="lotes_id" value="{{$lote->id}}">
					        @endif
					  </div>
					</div>

	    			@include('admin.pages.itens._partials.form')
		   		
		   		</form>
	    	</div>
	    </div>
	</div>
</div> 
  <div class="modal fade" id="modal-fornecedor" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sn">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar novo fornecedor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="{{ route('fornecedor.lote', [$ata->id, $lote->id]) }}" method="POST" id="fornec">
                @csrf
                  <div class="row">
                    <div class="col-sm-12">
                    
                     <div class="form-group">
                <label for="fornecedor">* Nome:</label>
                  <input type="text" class="form-control" name="fornecedor"  required placeholder="Digite o nome do fornecedor" value="{{ $fornecedor->fornecedor ?? old('nome') }}">
              </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                <label for="cnpj">* Nº CNPJ</label>
                <input type="text" class="form-control cnpj" name="cnpj" required placeholder="Digite o número do CNPJ"  value="{{ $fornecedor->cnpj ?? old('cnpj') }}">
              </div>
                    </div>
                    </div>
                
                  <div class="card-footer">
                  <button type="submit" class="btn btn-success formButton" id="sendfornec">Salvar</button>
                  <button type="button" data-dismiss="modal" class="btn btn-danger float-right">Cancelar</button>
                </div>
                </form>
                  </div>
            </div>
          </div>
        </div>

            <div class="modal fade" id="modal-objeto" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sn">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar novo objeto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="{{ route('objeto.lote', [$ata->id, $lote->id]) }}" method="POST" id="formIDobj">
                @csrf
                  <div class="row">
                    <div class="col-sm-12">
                    
                    <div class="form-group">
              <label for="nome">* Nome:</label>
              <textarea class="form-control" rows="3" name="nome" required placeholder="Digite o nome do objeto"  ></textarea>
            </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                <label for="nefisco">* Nº E-fisco</label>
                <input type="text" class="form-control nefisco" name="nefisco" required placeholder="Digite o número do EFISCO"  value="{{ $objeto->nefisco ?? old('nefisco') }}">
              </div>
                    </div>
                    </div>
                
                  <div class="card-footer">
                  <button type="submit" class="btn btn-success formButton" id="sendobj">Salvar</button>
                  <button type="button" data-dismiss="modal" class="btn btn-danger float-right">Cancelar</button>
                </div>
                </form>
                  </div>
            </div>
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



var fornec = document.getElementById("fornec");
var sendfornec = $("#sendfornec");

$(fornec).submit(function(event){
  if (fornec.checkValidity()) {
    sendfornec.attr('disabled', 'disabled');
  }
});


var formIDobj = document.getElementById("formIDobj");
var sendobj = $("#sendobj");

$(formIDobj).submit(function(event){
  if (formIDobj.checkValidity()) {
    sendobj.attr('disabled', 'disabled');
  }
});


</script>


@endsection