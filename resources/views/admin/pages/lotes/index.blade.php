@extends('adminlte::page')

@section('title', 'Lotes')

@section('content_header')
    <h1>	Lotes
    	 <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-lg">
            Criar Lote
        </button>
    </h1>
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
								<a href="{{ route('itens.create', [$atas->id, $lote->id]) }}" class="btn btn-info" ><i class="fas fa-plus"></i> ITENS</a>
		                		<a href="{{ route('lotes.edit', [$atas->id, $lote->id]) }}" class="btn btn-warning">EDITAR</a>
		                 		<a href="{{ route('lotes.destroy', [$atas->id, $lote->id]) }}" class="btn btn-danger" >DELETAR</a>
		                 		<!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
		                    		<i class="fas fa-minus"></i></button> -->
		                	</div>
                        </div>
		            <div class="card-body p-0">
                		<div class="table-responsive">
                  			<table class="table m-0">
                    			<thead>
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
				                    </tr>
                    			</thead>
                    		<tbody>
                    			<tr>
                  
	               			    </tr>           
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