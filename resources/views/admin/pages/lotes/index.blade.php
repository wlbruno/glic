@extends('adminlte::page')

@section('title', 'Lotes')

@section('content_header')
  @if($atas->status == 'CRIACAO')
    @if($atas->tipo == 'LOTE')
    <h1>	Lotes
    	 <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Criar Lote
        </button>
    <a href="{{ route('atas.finish', $atas->id) }}" class="btn btn-success">FINALIZAR ATA</a>
    </h1>
    @else
    <h1>  Itens
           <a href="{{ route('atas.finish', $atas->id) }}" class="btn btn-success">FINALIZAR ATA</a>
      </h1>
      @endif

      @else
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('atas.index') }}">Atas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('atas.show', $atas->id) }}">Ata {{$atas->nata}}</a></li>
    </ol> 
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
		                <h3 class="card-title"><strong>{{$lote->descricao}}</strong></h3>
							<div class="card-tools">
								        <a href="{{ route('itens.create', [$atas->id, $lote->id]) }}" class="btn btn-info" ><i class="fas fa-plus"></i> </a>
                        @if($atas->tipo == 'LOTE')
		                		<a href="{{ route('lotes.edit', [$atas->id, $lote->id]) }}" class="btn btn-warning "><i class="fas fa-edit"></i></a>
		                 		<a href="{{ route('lotes.destroy', [$atas->id, $lote->id])}}" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></a>
                        @endif
		                 		
		                	</div>
                        </div>
		            <div class="card-body p-0">
                		<div class="table-responsive">
                              
                  			<table class="table m-0">
                    			<thead>
                            @foreach($lote->ItensLote as $lote_item)
                            <tr>
					                   <th>Objeto</th>
        									   <th>N° E-fisco</th>
        									   <th>Fornecedor</th>
        									   <th>N° CNPJ</th>
        									   <th>Quantidade</th>
        									   <th>MAX</th>
        									   <th>Unidade de medida</th>
        										<th>Valor unitário</th>
        										<th>Valor total</th>
                            <th>Ações</th>
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
                                <td>{{$lote_item->item->medida}}</td>
                                <td>R$ {{$lote_item->item->vunitario}}</td>


                                <td>{{  'R$ '.number_format($lote_item->item->vtotal, 2, ',', '.') }}</td>           
                                <td>
                                  <a href="{{ route('lotes.edit', [$atas->id, $lote->id]) }}" class="btn btn-outline-warning btn-sm">EDITAR</a>
                                  <a href="{{ route('lotes.destroy', [$atas->id, $lote->id])}}" class="btn  btn-outline-danger btn-sm" >DELETAR</a>
                                  @if($atas->orgao == 'SIM')
                                  <a href="{{ route('orgao.create', [$atas->id, $lote->id, $lote_item->item->id])}}" class="btn btn-outline-dark btn-sm" >ÓRGÃO</a>
                                  @endif
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
                        <textarea class="form-control" rows="4" name="descricao" placeholder="Descrição ..." required></textarea>
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