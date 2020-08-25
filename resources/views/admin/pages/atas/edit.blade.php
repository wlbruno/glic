@extends('adminlte::page')

@section('title', "Editar a ata {$ata->nata}")

@section('content_header')
    <h1>Editar a ata  {{ $ata->nata }}</h1>
    <a href="{{ route('atas.show', $ata->id) }}" class="btn btn-dark">Voltar</a>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<form action="{{ route('atas.update', $ata->id) }}" class="form" method="POST">
    			@csrf
                @method('PUT')
                <div class="row">
                <div class="col-md-3">
                      <div class="form-group">
                        <label for="tipo">* Status da ata: </label>
                          <select class="form-control" required  value="{{ $ata->status }}"  name="status">
                            <option value="" disabled="" selected="">Selecione o status da ata</option>
                            <option value="SAVE">SALVAR</option>
                            <option value="PUBLIC">SALVAR E PUBLICAR</option>
                          </select>
                        </div>
                      </div>
                  </div>

    			@include('admin.pages.atas._partials.form')
          
	   		</form>
    	</div>
    </div>

@endsection