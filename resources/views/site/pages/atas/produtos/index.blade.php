@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', 'Atas de Produtos')

@section('content_header')

<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('atas.produtos') }}">Atas Produtos</a></li>
 </ol>

@stop

@section('content')
 <div class="card">
        <div class="card-header">
        <form action="{{ route('atas.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nº Ata ou Nº Processo" class="form-control" value="{{ $filters['filter'] ?? ''  }}">
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Nº Ata</th>
                        <th>Nº Pregão</th>
                        <th>Nº Processo</th>
                        <th>Vigencia</th>
                        <th>Tipo</th>
                        <th>Comissão</th>
                       @can('licita_carona')
                            <th width="150">Ações</th>
                        @endcan                    </tr>
                </thead>
                <tbody>
                    @foreach($atasProdutos as $ata)
                        <tr>
                            <td>{{ $ata->descricao }}</td>
                            <td>{{ $ata->nata }}</td>
                            <td>{{ $ata->npregao }}</td>
                            <td>{{ $ata->nprocesso }}</td>
                            <td>{{ date( 'd/m/Y', strtotime($ata->vigencia)) }}</td>
                            <td>{{ $ata->tipo }}</td>
                            <td>{{ $ata->comissao }}</td>
                          
                           @can('licita_carona')
                            <td style="width: 10px;">
                               
                                <a href="{{ route('licita.index', $ata->id) }}" class="btn btn-info">Solicitar</a>    
                            </td>
                            @endcan         
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $atasProdutos->appends($filters)->links() !!}
            @else

            {!! $atasProdutos->links() !!}
            @endif

        </div>
    </div>

@stop