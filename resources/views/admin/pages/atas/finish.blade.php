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
								<th>N° ATA</th>
								<th>N° PREGÃO</th>
								<th>N° PROCESSO</th>
								<th>DATA DA ASSINATURA</th>
								<th>VIGÊNCIA</th>
								<th>TIPO</th>
								<th>COMISSÃO</th>
								<th>PDF</th>
							</tr>
                  		</thead>
                  	<tbody>
		                <tr>
		                  	<td>{{$atas->departamento}}</td>
		                    <td>{{$atas->nata}}</td>
		                    <td>{{$atas->npregao}}</td>
		                    <td>{{$atas->nprocesso}}</td>
		                    <td>{{ date( 'd/m/Y', strtotime($atas->data_assinatura))}}</td>
							<td>{{ date( 'd/m/Y', strtotime($atas->data_vigencia)) }}</td>
		                    <td>{{$atas->tipo}}</td>
		                    <td>{{$atas->comissao}}</td>
	                        <td width="40"><a href="{{ route('download.pdf', $atas->id) }}">{{ $atas->arquivo }}</a></td>
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
                        		<input type="hidden" value="SISTEMA" name="status">
                      			<button type="submit" class="btn btn-info">SALVAR NO SISTEMA</button>
                    </form>
                </div>
                <div class="card-footer">
                    <form action="{{ route('atas.public', $atas->id) }}" method="POST">
                       @csrf
                       @method('PUT')
                       	<input type="hidden" value="PUBLICADA" name="status">
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
										<td>{{  'R$ '.number_format($lote_item->item->vtotal, 2, ',', '.') }}</td>           
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

 	<!------------------------------- MODAL ----------------------------------------->

<div id="Modal" class="modal fade bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Editar Fornecedor</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
           <form action="{{ route('fornecedor.edit.lotes') }}" class="form" method="POST">
          <div class="modal-body">
               @csrf
                <input type="hidden" value="{{$lote_item->item->fornecedores->id}}" name="id">
            <div class="col-md-12">
              <div class="form-group">
                <label for="fornecedor">* Nome: </label>
                <input type="text" class="form-control" name="fornecedor"  placeholder="Digite o nome do fornecedor" value="{{$lote_item->item->fornecedores->fornecedor}}">
              </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="cnpj">* Nº CNPJ </label>
              <input type="text" class="form-control cnpj" name="cnpj" required placeholder="Digite o número do CNPJ"  value="{{$lote_item->item->fornecedores->cnpj}}">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
       </form>       
      
    </div>
  </div>
      </div>



      <div id="ModalObjeto" class="modal fade bd-example-modal-lg" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Editar Objeto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
           <form action="{{ route('objeto.edit.lotes') }}" class="form" method="POST">
          <div class="modal-body">
               @csrf
                <input type="hidden" value="{{$lote_item->item->objetos->id}}" name="id">
            <div class="col-md-12">
              <div class="form-group">
                 <label for="nefisco">* Nº E-fisco: </label>
                   <input type="text" class="form-control nefisco" name="nefisco" required placeholder="Digite o número do EFISCO"  value="{{$lote_item->item->objetos->nefisco}}">
              </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="cnpj">* Nome: </label>
               <textarea name="nome" cols="15" rows="5" required class="form-control" placeholder="Digite o nome do objeto">{{$lote_item->item->objetos->nome}}</textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salvar</button>
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

</script>
   <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
@endsection