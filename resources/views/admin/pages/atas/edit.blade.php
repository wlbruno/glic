@extends('adminlte::page')

@section('title', "Editar a ata {$ata->nata}")

@section('content_header')


    <div class="row">
      <div class="col-md-12">
	  <div class="card card-default">
      <div class="card-header">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
	        <li class="breadcrumb-item"><a href="{{ route('atas.index') }}"><strong>LISTAGEM DE ATAS</strong></a></li>
        <li class="breadcrumb-item"><a href="{{ route('atas.show', $ata->id) }}"><strong>VISUALIZAR ATA: {{$ata->nata}}</strong></a></li>
          <li class="breadcrumb-item"><strong>EDITAR ATA: {{ $ata->nata }}</strong></li>
        </ol>
		</div>
    </div>
      </div>
    </div>
<br>

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
                            @if($ata ?? '' == true ?? '')
                            <option value="{{ $ata->status }}"  selected="">{{ $ata->status }}</option>
                            @else()
                            <option value="" disabled="" selected="">Selecione o status da ata</option>
                            @endif
                            <option value="SISTEMA">SALVAR NO SISTEMA</option>
                            <option value="PUBLICADA"> PUBLICAR</option>
                          </select>
                        </div>
                      </div>
                  </div>

    			@include('admin.pages.atas._partials.form')
          
	   		</form>
    	</div>
    </div>

@endsection