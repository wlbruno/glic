@extends('adminlte::page')

@section('title', 'Cadastrar nova Item')

@section('content_header')
    <h1>Cadastrar novo Item </h1>
@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		
    <div class="card">
    	<div class="card-body">
  		   <div class="card-header border-transparent">
               
					<div class="card-tools">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">Criar Fornecedor</button>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-secondary">Criar Objeto</button>
	               	</div>
                 </div>

	    		<form action="{{ route('itens.store', [$ata->id, $lote->id]) }}" class="form" method="POST">
	    			@csrf
	    			<div class="row">
					  <div class="col-md-6">
					      @if(count($ata->lotes) == 0)
					        <div class="form-group"> 
					          <label for="descricao">Descrição</label>
					            <input type="text" name="descricao" required="">
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

@endsection