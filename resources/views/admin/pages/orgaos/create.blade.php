@extends('adminlte::page')

@section('title', 'Cadastrar órgão')

@section('content_header')
    <h1>Cadastrar órgão  </h1>
    
    <h3>Saldo do item {{ ''.number_format($itens->saldoOP, 0, ',', '.') }}</h3>
   
@stop

@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="card">
    	<div class="card-body">
  			<div class="card-header border-transparent">
       		<div class="card-tools">
            <a href="{{ route('lotes.create', $atas->id) }}" class="btn btn-success">Finalizar órgãos do item </a>
      			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-orgao">Adicionar Órgão</button>
					</div>
        </div>
		    	<div class="card-body p-0">
            <div class="table-responsive">
            	<table class="table m-0">
                <thead>
	               <tr>
	                 <th>Órgão</th>
	                 <th>Cnpj</th>
	                 <th>Ramal</th>
	                 <th>Saldo</th>
			           </tr>
                </thead>
                <tbody>
                  @foreach($itens->orgaos as $orgao)
                    <tr>
                  		<td>{{$orgao->users->name}}</td>
                      <td>{{$orgao->users->Solicitante->cnpj}}</td>
                      <td>{{$orgao->users->Solicitante->ramal}}</td>
                      <td>{{ ''.number_format($orgao->saldo, 0, ',', '.') }} </td>
                      <td>
                      <a class="btn btn-sm btn-danger" href="{{ route('orgao.destroy', [$itens->id, $orgao->id]) }}">Remover</a>
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
  </div>
  
   <div class="modal fade" id="modal-orgao" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar órgão</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="{{ route('orgao.store', [$atas->id, $lotes->id, $itens->id]) }}" method="POST">
              	@csrf
              	<input type="hidden" value="{{$atas->id}}" name="atas_id">
              	<input type="hidden" value="{{$itens->id}}" name="itens_id">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
				      		<label for="users_id">* Órgãos</label>
				        		<select class="form-control" required name="users_id">
				          			<option value="" disabled="" selected="">Selecione o Órgão</option>
				          			@foreach($users as $user)
				          			<option value="{{$user->id}}">{{$user->name}} </option>
				          			@endforeach
				                 </select>
				     		 </div>
                 
				     	 <div class="form-group">
				      		<label for="saldo">* Saldo</label>
                
				        		<input type="text" class="form-control" min="0" max="{{$itens->saldoOP}}" name="saldo" required>
				     		 </div>
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