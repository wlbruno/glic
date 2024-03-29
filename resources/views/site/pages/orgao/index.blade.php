@extends('site.layout.master')

@section('title', 'GLIC')

@section('content_header')
<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><strong>ATAS PARA ÓRGÃO</strong></li>
        </ol>
      </div>
    </div>
<br>


@stop

@section('content')
<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Atenção!</h5>
                  Essa opção é destinada aos Órgãos Participantes das atas da Secretaria Estadual de Saúde do Estado de Pernambuco.
                </div>

<div class="row">
  <div class="col-md-12">
    
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
                        <th>Departamento</th>
                      
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
                    @foreach($atas as $ata)
                    @if($ata->atas->status === "PUBLICADA")
                    

                <tbody>
                           <td>{{ $ata->atas->departamento }}</td>
                            <td>{{ $ata->atas->nata }}</td>
                            <td>{{ $ata->atas->npregao }}</td>
                            <td>{{ $ata->atas->nprocesso }}</td>
                            <td>{{ date( 'd/m/Y', strtotime($ata->atas->data_vigencia)) }}</td>
                            <td>{{ $ata->atas->tipo }}</td>
                            <td>{{ $ata->atas->comissao }}</td>
                          
                         
                          @can('licita_carona')
                            <td style="width: 10px;">
                               
                                <a href="{{ route('show.licita.orgao', $ata->id) }}" class="btn btn-info">Solicitar</a>    
                            </td>
                            @endcan         
                </tbody>
                @else 
                <tbody>
                  <td>
                <p><strong>Não possui atas para você</strong></p>
                  
                  </td>
                </tbody>
                @endif
                    @endforeach
                  
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
    </div>
        </div>



@stop