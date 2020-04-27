@extends('adminlte::page')

@section('title', 'Finalizar ata')

@section('content_header')
    <h1>Finalizar ata </h1>
@stop

@section('content')

 <div class="row">
          <div class="col-12">
            <div class="card">
              
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed">
                <thead>
                    	<tr>
		                    <th>DEPARTAMENTO</th>
		                    <th>DESCRIÇÃO</th>
		                    <th>N° ATA</th>
		                    <th>N° PREGÃO</th>
		                    <th>N° PROCESSO</th>
		                    <th>VIGÊNCIA</th>
		                    <th>TIPO</th>
		                    <th>COMISSÃO</th>
	                    </tr>
                  	</thead>
                  	<tbody>
		                <tr>
		                   	<td>{{$atas->departamento}}</td>
		                    <td>{{$atas->descricao}}</td>
		                    <td>{{$atas->nata}}</td>
		                    <td>{{$atas->npregao}}</td>
		                    <td>{{$atas->nprocesso}}</td>
		                    <td>{{$atas->vigencia}}</td>
		                    <td>{{$atas->tipo}}</td>
		                    <td>{{$atas->comissao}}</td>
		                </tr>
                    </tbody>
                </table>
                <table class="table table-head-fixed">
                    <thead>
                        <th> Descrição</th>
                    </thead>
                    <tbody>
                        <td>{{ $atas->descricao }}</td>
                    </tbody>
                </table>
              </div>
                  <div class="card-footer">
                    <form action="{{ route('atas.save', $atas->id) }}" method="POST">
                      @csrf
                       @method('PUT')
                        <input type="hidden" value="SAVE" name="status">
                      <button type="submit" class="btn btn-info">SALVAR</button>
                    </form>
                  </div>
                  <div class="card-footer">
                    <form action="{{ route('atas.public', $atas->id) }}" method="POST">
                        @csrf
                       @method('PUT')
                       <input type="hidden" value="PUBLIC" name="status">
                      <button type="submit" class="btn btn-info ">SALVAR E PUBLICAR</button>
                    </form>
                  </div>
            </div>
          </div>
        </div>



   	<!-------------------------------ATA TIPO LOTE ABAIXO ----------------------------------------->
    <div class="row">
		<div class="col-sm-12">
			@foreach($atas->lotes as $lote)
			   	<div class="card">
		    		<div class="card-body">
					  <div class="card">
		              	<div class="card-header border-transparent">
		                	<h3 class="card-title"><strong>{{$lote->descricao}}</strong></h3>
							<div class="card-tools">
			                    @if($atas->tipo == 'LOTE')
		    	          		<a href="{{ route('lotes.edit', [$atas->id, $lote->id]) }}" class="btn btn-warning ">EDITAR</a>
		                 		<a href="{{ route('lotes.destroy', [$atas->id, $lote->id])}}" class="btn btn-danger" >DELETAR</a>
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
		                                <td>{{$lote_item->item->teto}}</td>
		                                <td>{{$lote_item->item->medida}}</td>
		                                <td>{{$lote_item->item->vunitario}}</td>
		                                <td>{{$lote_item->item->vtotal}}</td>           
		                                <td>
		                                  <a href="{{ route('lotes.edit', [$atas->id, $lote->id]) }}" class="btn btn-outline-warning btn-sm">EDITAR</a>
		                                  <a href="{{ route('lotes.destroy', [$atas->id, $lote->id])}}" class="btn  btn-outline-danger btn-sm" >DELETAR</a>
		                                  <a href="{{ route('lotes.destroy', [$atas->id, $lote->id])}}" class="btn btn-outline-dark btn-sm" >ÓRGÃO</a>
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

@endsection