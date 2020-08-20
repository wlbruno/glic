@extends('adminlte::page')

@section('title', 'Atas')

@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="/">Site</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('atas.index') }}">Atas</a></li>
    </ol>
</nav>

    <h1>Atas
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
            <input type="text" name="filter" placeholder="Nº Ata ou Nº Processo" class="form-control nata" value="{{ $filters['filter'] ?? ''  }}">
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
                            <td>{{ $ata->vigencia }}</td>
                            <td>{{ $ata->tipo }}</td>
                            <td>{{ $ata->comissao }}</td>
                           
                            <td>{{ $ata->orgao }}</td>
                            @if($ata->status == 'PUBLICADA')
                            <td><span class="badge badge-success">{{$ata->status}}</span></td>
                            @elseif($ata->status == 'SALVA')
                            <td><span class="badge badge-info">{{$ata->status}}</span></td>
                            @else
                            <td><span class="badge badge-warning">{{$ata->status}}</span></td>
                            @endif

                            <td style="width: 10px;">
                                @can('edit_ata')
                                <a href="{{ route('atas.edit', $ata->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> EDITAR</a>
                                @endcan
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
