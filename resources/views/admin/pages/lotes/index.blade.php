@extends('adminlte::page')

@if($atas->tipo === 'ITEM')
  @section('title', 'ITENS')
@else
  @section('title', 'LOTES')
@endif

@section('content_header')

  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
	      <li class="breadcrumb-item"><a href="{{ route('atas.index') }}"><strong>LISTAGEM DE ATAS</strong></a></li>
        <li class="breadcrumb-item"><a href="{{ route('atas.show', $atas->id) }}"><strong>Nº ATA {{$atas->nata}}</strong></a></li>
          @if($atas->tipo === 'ITEM')
            <li class="breadcrumb-item"><strong>ITENS</strong></li>
          @else
            <li class="breadcrumb-item"><strong>LOTES</strong></li>
          @endif
        </ol>
      </div>
    </div>  
  <br>
  
  @if($atas->status === 'CRIACAO' &&  $atas->tipo === 'LOTE')
    <h1>
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-lg">CRIAR LOTE</button>  
  
    <a href="{{ route('atas.finish', $atas->id) }}" class="btn btn-secondary">FINALIZAR ATA</a>
    </h1>
  @endif 

  @if($atas->status === 'CRIACAO' &&  $atas->tipo === 'ITEM')
    <h1>
      <a href="{{ route('atas.finish', $atas->id) }}" class="btn btn-secondary">FINALIZAR ATA</a>
    </h1>
  @endif

  @if($atas->status === 'PUBLICADA' &&  $atas->tipo === 'LOTE')
    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-warning">
          <h5><strong>ATENÇÃO!</strong></h5>
            <p>Essa ata já foi publicada, cuidado com as mudanças pois essa ata já pode ter sido <strong>licitada.</strong></p>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-lg">CRIAR LOTE</button>
        </div>
      </div>
    </div>
  @endif

  @if($atas->status === 'PUBLICADA' &&  $atas->tipo === 'ITEM')
    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-warning">
          <h5><strong>ATENÇÃO!</strong></h5>
            <p>Essa ata já foi publicada, cuidado com as mudanças pois essa ata já pode ter sido <strong>licitada.</strong></p>
        </div>
      </div>
    </div>
  @endif

  
  @if($atas->status === 'SISTEMA' &&  $atas->tipo === 'ITEM')
    <div class="row">
      
        
    </div>
  @endif

  @if($atas->status === 'SISTEMA' &&  $atas->tipo === 'LOTE')
    <div class="row">
      
      <div class="col-sm-2">
        <div class="callout callout-secondary">
           <p> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-lg">CRIAR LOTE</button></p>
        </div>
      </div>
    </div>
  @endif


@stop

@section('content')
@include('admin.includes.alerts')
  <div class="row">
	  <div class="col-sm-12">
      @foreach($atas->lotes as $lote)
        <div class="card">
          <div class="card-body">
            <div class="card">
                <div class="card-header border-transparent">
                  @if($atas->tipo === 'LOTE')
                    <h3 class="card-title"><strong>{{$lote->descricao}}</strong></h3>
                  @endif
                <div class="card-tools">
                  <a href="{{ route('itens.create', [$atas->id, $lote->id]) }}" class="btn btn-secondary" ><i class="fas fa-plus">Adicionar item</i> </a>
                    @if($atas->tipo == 'LOTE')
                		  <a href="{{ route('lotes.edit', [$atas->id, $lote->id]) }}" class="btn btn-secondary "><i class="fas fa-edit"></i> Editar</a>
                  		<a href="{{ route('lotes.destroy', [$atas->id, $lote->id])}}" class="btn btn-secondary" ><i class="fas fa-trash-alt"></i>Apagar</a>
                    @endif
              	</div>
              </div>
		            <div class="card-body p-0">
               		<div class="table-responsive">
               			<table class="table m-0">
                 			<thead>
                        @foreach($lote->ItensLote as $lote_item)
                          <tr>
  				                  <th width="500">Objeto</th>
        									  <th width="125">N° E-fisco</th>
        									  <th>Fornecedor</th>
        									  <th>N° CNPJ</th>
        									  <th>Quantidade</th>
        									  <th>MAX</th>
                            <th width="100">Marca</th>
        									  <th width="150">Unidade de medida</th>
        										<th width="150">Valor unitário</th>
        										<th width="180">Valor total</th>
                            <th >Ações</th>
				                  </tr>
                    	</thead>
                    	<tbody>
                    		<tr>
                          <td>{{$lote_item->item->objetos->nome}}</td>
                          <td>{{$lote_item->item->objetos->nefisco}}</td>
                          <td>{{$lote_item->item->fornecedores->fornecedor}}</td>
                          <td>{{$lote_item->item->fornecedores->cnpj}}</td>
                          <td>{{$lote_item->item->quantidade}}</td>
                          <td>{{$lote_item->item->max}}</td>
                          <td>{{$lote_item->item->marca}}</td>
                          <td>{{$lote_item->item->medida}}</td>
                          <td>R$ {{$lote_item->item->vunitario}}</td>
                          <td>{{  'R$ '.number_format($lote_item->item->vtotal, 3 , ',',  '.') }}</td>           
                          <td>
                            <button type="button" class="btn btn-secondary btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">Ações </button>
                              <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu" x-placement="bottom-start">
                                  <a href="#Modal" class="dropdown-item" >Editar Fornecedor</a>
                                  <a href="#ModalObjeto" class="dropdown-item" >Editar Objeto</a>
                                  <a href="{{ route('item.destroy', [$atas->id, $lote_item->item->id]) }}" class="dropdown-item"> Deletar item</a>  
                                
                                  <a href="{{ route('item.edit', [$atas->id, $lote->id, $lote_item->item->id]) }}" class="dropdown-item"> Editar item</a>  
                                    <div class="dropdown-divider"></div>
                                      @if($atas->orgao == 'SIM')
                                        <a class="dropdown-item"href="{{ route('orgao.create', [$atas->id, $lote->id, $lote_item->item->id])}}">Adicionar orgão</a>
                                      @endif
                                    </div>
                          </td>    
              			    </tr>
                      @endforeach
                  	</tbody>
                  </table>           
                </div>
              </div>
            </div>
    	    </div>
        </div>
      @endforeach
    </div>
  </div>
        <!-- MODAL CRIAR LOTE -->
  <div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Criar novo lote</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
            <form role="form" action="{{ route('lotes.store', $atas->id) }}" method="POST" id="formID">
          <div class="modal-body">
              @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="descricao">Descrição do lote</label>
                        <input class="form-control" required name="descricao" placeholder="Descrição...">  
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success formButton" id="send">Salvar</button>
                  <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cancelar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

       <!-- MODAL EDITAR FORNECEDOR -->
      <div id="Modal" class="modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Fornecedor</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                <form action="{{ route('fornecedor.edit.lotes') }}" class="form" method="POST" id="formIDforn">
                <div class="modal-body">
                    @csrf
                      <input type="hidden" value="{{$lote_item->item->fornecedores->id ?? '' }}" name="id">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="fornecedor">* Nome: </label>
                      <input type="text" class="form-control" name="fornecedor"  placeholder="Digite o nome do fornecedor" value="{{$lote_item->item->fornecedores->fornecedor ?? '' }}">
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="cnpj">* Nº CNPJ </label>
                    <input type="text" class="form-control cnpj" name="cnpj" required placeholder="Digite o número do CNPJ"  value="{{$lote_item->item->fornecedores->cnpj ?? '' }}">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success formButton" id="fornec">Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              </div>
            </form>       
          </div>
        </div>
      </div>


       <!-- MODAL EDITAR OBJETO -->
          <div id="ModalObjeto" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                 <h4 class="modal-title">Editar Objeto</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form action="{{ route('objeto.edit.lotes') }}" class="form" method="POST" id="formIDobj">
                <div class="modal-body">
                    @csrf
                      <input type="hidden" value="{{$lote_item->item->objetos->id ?? '' }}" name="id">
                        <div class="col-md-12">
                         <div class="form-group">
                           <label for="nefisco">* Nº E-fisco: </label>
                           <input type="text" class="form-control nefisco" name="nefisco" required placeholder="Digite o número do EFISCO"  value="{{$lote_item->item->objetos->nefisco ?? '' }}">
                       </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="cnpj">* Nome: </label>
                        <textarea name="nome" cols="15" rows="5" required class="form-control" placeholder="Digite o nome do objeto">{{$lote_item->item->objetos->nome ?? '' }}</textarea>
                     </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success formButton"  id="obj">Salvar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </div>
                </form>       
              </div>
           </div>
        </div>

@endsection

@section('js')


<script>
$('a[href$="#Modal"]').on( "click", function() {
   $('#Modal').modal('show');
});

$('a[href$="#ModalObjeto"]').on( "click", function() {
   $('#ModalObjeto').modal('show');
});

var formID = document.getElementById("formID");
var send = $("#send");

$(formID).submit(function(event){
  if (formID.checkValidity()) {
    send.attr('disabled', 'disabled');
  }
});


var formIDforn = document.getElementById("formIDforn");
var fornec = $("#fornec");

$(formIDforn).submit(function(event){
  if (formIDforn.checkValidity()) {
    fornec.attr('disabled', 'disabled');
  }
});

var formIDobj = document.getElementById("formIDobj");
var obj = $("#obj");

$(formIDobj).submit(function(event){
  if (formIDobj.checkValidity()) {
    obj.attr('disabled', 'disabled');
  }
});



</script> 

<script src="{{asset('js/jquery.mask.js')}}"></script>
<script src="{{asset('js/mask.js')}}"></script>
      

@endsection