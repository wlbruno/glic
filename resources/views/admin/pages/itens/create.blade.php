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
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-objeto">Criar Objeto</button>
	               	</div>
                 </div>

	    		<form action="{{ route('itens.store', [$ata->id, $lote->id]) }}" class="form" method="POST">
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

    <div class="modal fade" id="modal-objeto" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Criar novo lote</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="" method="POST">
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


         <div class="modal fade" id="modal-fornecedor" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Criar novo lote</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="" method="POST">
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