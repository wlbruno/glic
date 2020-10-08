@extends('adminlte::page')

@section('title', 'Cadastrar nova Item')

@section('content_header')
    <h1>Editar item</h1>
    <div class="row">
<div class="col-md-12">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active"></li>
        
    </ol>
</nav>
</div>
</div>
@stop


@section('content')
<div class="row">
<div class="col-md-12">

<div class="card-header border-transparent">
               
               <div class="card-tools">
               <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-fornecedor">Criar Fornecedor</button>
               <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-objeto">Criar Objeto</button>
                       </div>
                      </div>
<div class="card">
    	<div class="card-body">
    		<form action="{{ route('item.update', [$ata, $lote, $item->id]) }}" class="form" method="POST">
    			@csrf

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
              <form role="form" action="/" method="POST">
              	@csrf
                  <div class="row">
                    <div class="col-sm-12">
                    
                     <div class="form-group">
						    <label for="fornecedor">* Nome:</label>
						      <input type="text" class="form-control" name="fornecedor" required placeholder="Digite o nome do fornecedor" value="{{ $fornecedor->fornecedor ?? old('nome') }}">
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
                  <button type="submit" class="btn btn-success">Salvar</button>
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
              <h4 class="modal-title">Adicionar novo fornecedor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="/" method="POST">
              	@csrf
                  <div class="row">
                    <div class="col-sm-12">
                    
                    <div class="form-group">
					    <label for="nome">* Nome:</label>
					      <input type="text" class="form-control" name="nome" required placeholder="Digite o nome do objeto" value="{{ $objeto->nome ?? old('nome') }}">
					  </div>
                    </div>
                    <div class="col-sm-12">
                    	  <div class="form-group">
						    <label for="nefisco">* Nº E-fisco</label>
						    <input type="text" class="form-control nefisco"  name="nefisco" required placeholder="Digite o número do EFISCO"  value="{{ $objeto->nefisco ?? old('nefisco') }}">
						  </div>
                    </div>
                    </div>
                
                  <div class="card-footer">
                  <button type="submit" class="btn btn-success">Salvar</button>
                  <button type="button" data-dismiss="modal" class="btn btn-danger float-right">Cancelar</button>
                </div>
                </form>
                  </div>
            </div>
          </div>
        </div>


@endsection