@extends('adminlte::page')

@section('title', 'Cadastrar órgão')

@section('content_header')
    <h1>Cadastrar órgão ao item {{$itens->objetos->nome}} </h1>
@stop

@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="card">
    	<div class="card-body">
  			<div class="card-header border-transparent">
       		<div class="card-tools">
            <a href="{{ route('lotes.create', $atas->id) }}" class="btn btn-success">Finalizar órgãos do item {{$itens->objetos->nome}}</a>
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
                      <td>3123</td>
                      <td>123</td>
                      <td>{{$orgao->saldo}}</td>
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
              	<input type="hiddem" value="{{$atas->id}}" name="atas_id">
              	<input type="hiddem" value="{{$itens->id}}" name="itens_id">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
				      		<label for="users_id">Órgãos</label>
				        		<select class="form-control" required name="users_id">
				          			<option value="" disabled="" selected="">Selecione o Órgão</option>
				          			@foreach($users as $user)
				          			<option value="{{$user->id}}">{{$user->email}} </option>
				          			@endforeach
				                 </select>
				     		 </div>
				     	 <div class="form-group">
				      		<label for="saldo">Saldo</label>
				        		<input type="text" class="form-control" name="saldo">
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