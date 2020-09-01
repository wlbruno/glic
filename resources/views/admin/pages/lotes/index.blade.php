@extends('adminlte::page')

@section('title', 'Lotes')

@section('content_header')
  @if($atas->status == 'CRIACAO')
    @if($atas->tipo == 'LOTE')
      <h1>	LOTES
    	 <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Criar Lote
        </button>
      <a href="{{ route('atas.finish', $atas->id) }}" class="btn btn-success">FINALIZAR ATA</a>
    </h1>
  @else
    <h1>  ITENS
      <a href="{{ route('atas.finish', $atas->id) }}" class="btn btn-success">FINALIZAR ATA</a>
    </h1>
  @endif
  @else
    <a href="{{ route('atas.show', $atas->id) }}" class="btn btn-dark">Voltar</a>
  @endif
@stop

@section('content')
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
				        <a href="{{ route('itens.create', [$atas->id, $lote->id]) }}" class="btn btn-info" ><i class="fas fa-plus">Adicionar item</i> </a>
                  @if($atas->tipo == 'LOTE')
                		<a href="{{ route('lotes.edit', [$atas->id, $lote->id]) }}" class="btn btn-warning "><i class="fas fa-edit"></i> Editar</a>
                 		<a href="{{ route('lotes.destroy', [$atas->id, $lote->id])}}" class="btn btn-danger" ><i class="fas fa-trash-alt"></i>Apagar</a>
                  @endif
              	</div>
              </div>
		            <div class="card-body p-0">
               		<div class="table-responsive">
               			<table class="table m-0">
                 			<thead>
                        @foreach($lote->ItensLote as $lote_item)
                          <tr>
  				                  <th >Objeto</th>
        									  <th width="125">N° E-fisco</th>
        									  <th>Fornecedor</th>
        									  <th>N° CNPJ</th>
        									  <th>Quantidade</th>
        									  <th>MAX</th>
                            <th width="100">Marca</th>
        									  <th width="150">Unidade de medida</th>
        										<th width="150">Valor unitário</th>
        										<th width="180">Valor total</th>
                            <th>Ações</th>
				                  </tr>
                    	</thead>
                    	<tbody>
                    		<tr>
                          <td>{{$lote_item->item->objetos->nome}}</td>
                          <td>{{$lote_item->item->objetos->nefisco}}</td>
                          <td>{{$lote_item->item->fornecedores->fornecedor}}</td>
                          <td >{{$lote_item->item->fornecedores->cnpj}}</td>
                          <td>{{$lote_item->item->quantidade}}</td>
                          <td>{{$lote_item->item->max}}</td>
                          <td>{{$lote_item->item->marca}}</td>
                          <td>{{$lote_item->item->medida}}</td>
                          <td>R$ {{$lote_item->item->vunitario}}</td>
                          <td>{{  'R$ '.number_format($lote_item->item->vtotal, 3, ',', '.') }}</td>           
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                              <a href="" class="dropdown-item"> Editar Objeto</a>  
                              <a href="" class="dropdown-item"> Editar Fornecedor</a>  
                              <a href="{{ route('item.destroy', [$atas->id, $lote_item->item->id]) }}" class="dropdown-item"> Deletar item</a>  
                              <a href="{{ route('item.edit', [$atas->id, $lote->id, $lote_item->item->id]) }}" class="dropdown-item"> Editar item</a>  
                                @if($atas->orgao == 'SIM')
                                  <a class="dropdown-item"href="{{ route('orgao.create', [$atas->id, $lote->id, $lote_item->item->id])}}">ÓRGÃO</a>
                                @endif
                              </div>
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
  <div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Criar novo lote</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" action="{{ route('lotes.store', $atas->id) }}" method="POST">
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
                  <button type="submit" class="btn btn-success">Salvar</button>
                  <button type="cancel" class="btn btn-danger float-right">Cancelar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection