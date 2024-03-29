@extends('site.layout.master')

@section('title', 'GLIC')

@section('content_header')
<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><strong>PÁGINA DE PESQUISA</strong></li>
        </ol>
      </div>
    </div>
<br>

@stop

@section('content')
 <div class="card">
        <div class="card-header">
       <form action="{{ route('atas.search.index') }}" method="POST" class="form form-inline ">
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
                        <th>Descrição</th>
                        <th>Nº Ata</th>
                        <th>Nº Pregão</th>
                        <th>Nº Processo</th>
                        <th>Vigencia</th>
                        <th>Tipo</th>
                        <th>Comissão</th>
                         @can('licita_carona')
                            <th width="150">Ações</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($atas as $ata)
                        <tr>
                            <td>{{ $ata->descricao }}</td>
                            <td>{{ $ata->nata }}</td>
                            <td>{{ $ata->npregao }}</td>
                            <td>{{ $ata->nprocesso }}</td>
                            <td>{{ date( 'd/m/Y', strtotime($ata->data_vigencia)) }}</td>
                            <td>{{ $ata->tipo }}</td>
                            <td>{{ $ata->comissao }}</td>
                          
                         
                          @can('licita_carona')
                            <td style="width: 10px;">
                               
                                <a href="{{ route('licita.index', $ata->id) }}" class="btn btn-info">Solicitar</a>    
                            </td>
                            @endcan         
                       </tr>
                       @empty
                       <div class="alert alert-warning">
                       <p><strong> <i class="fas fa-exclamation-circle"></i> Não existe registro </strong></p>
                                </div>

                      
              @endforelse
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
