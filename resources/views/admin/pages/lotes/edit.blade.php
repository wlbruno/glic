@extends('adminlte::page')

@section('title', "Editar Lote")

@section('content_header')
    <h1>Editar Lote  {{ $lote->descricao }}</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('lotes.update', [$ata->id, $lote->id]) }}" class="form" method="POST">
    			@csrf
                @method('PUT')

    			  <div class="row">
                    <div class="col-sm-12">
                    
                      <div class="form-group">
                        <label for="descricao">* Descrição do lote</label>
                        <textarea class="form-control" rows="4" name="descricao" required placeholder="Descrição ..."></textarea>
                      </div>
                    </div>
                    </div>
                      <div class="card-footer">
                  <button type="submit" class="btn btn-success">Salvar</button>
                  <a href="{{ route('lotes.create', $ata->id) }}" class="btn btn-danger float-right">Voltar</a>
                </div>
	   		</form>
    	</div>
    </div>

@endsection