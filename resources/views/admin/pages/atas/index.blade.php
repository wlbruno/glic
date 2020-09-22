@extends('adminlte::page')

@section('title', 'Atas')

@section('content_header')
<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
            <li class="breadcrumb-item"><strong>LISTAGEM DE ATAS</strong></li>
        </ol>
      </div>
    </div>
<br>


    <h1>
        @can('add_ata')
    <a href="{{ route('atas.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a>
    @endcan
 </h1>

@stop

@section('content')
 <div class="card">
        <div class="card-header">
        <form action="{{ route('atas.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nº Ata ou Nº Processo" class="form-control nata" value="{{ $filters['filter'] ?? ''  }}">&nbsp;
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Departamento</th>
                        <th>Nº Ata</th>
                        <th>Nº Pregão</th>
                        <th>Nº Processo</th>
                        <th>Vigencia</th>
                        <th>Tipo</th>
                        <th>Comissão</th>
                        
                        <th>Órgão</th>
                        <th>Status</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atas as $ata)
                        <tr>
                            <td>{{ $ata->departamento }}</td>
                            <td>{{ $ata->nata }}</td>
                            <td>{{ $ata->npregao }}</td>
                            <td>{{ $ata->nprocesso }}</td>
                            <td>{{ date( 'd/m/Y', strtotime($ata->vigencia)) }}</td>
                            <td>{{ $ata->tipo }}</td>
                            <td>{{ $ata->comissao }}</td>
                            <td>{{ $ata->orgao }}</td>
                            @if($ata->status == 'PUBLICADA')
                            <td><span class="badge badge-success">{{$ata->status}}</span></td>
                            @elseif($ata->status == 'SISTEMA')
                            <td><span class="badge badge-info">{{$ata->status}}</span></td>
                            @else
                            <td><span class="badge badge-warning">{{$ata->status}}</span></td>
                            @endif

                            <td style="width: 10px;">
                         
                                <a href="{{ route('atas.show', $ata->id) }}" class="btn btn-info"><i class="fas fa-search"></i> DETALHAR</a>    
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $atas->appends($filters)->links() !!}
            @else

            {!! $atas->links() !!}
            @endif

        </div>
    </div>


@stop

@section('js')
         <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
@stop
