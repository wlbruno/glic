@extends('site.layout.master')

@section('title', 'GLIC')

@section('content_header')


 <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><strong>ATAS SERVIÇOS EM GERAL</strong></li>
        </ol>
      </div>
    </div>
<br>
@stop

@section('content')
 <div class="card">
        <div class="card-header">
        <form action="{{ route('atas.search.index') }}" method="POST" class="form form-inline">
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
                        
                        <th>Nº Ata</th>
                        <th>Nº Pregão</th>
                        <th>Nº Processo</th>
                        <th>Vigencia</th>
                        <th>Tipo</th>
                        <th>Comissão</th>
                            <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atasServico as $ata)
                        <tr>
                          
                            <td>{{ $ata->nata }}</td>
                            <td>{{ $ata->npregao }}</td>
                            <td>{{ $ata->nprocesso }}</td>
                            <td>{{ date( 'd/m/Y', strtotime($ata->data_vigencia)) }}</td>
                            <td>{{ $ata->tipo }}</td>
                            <td>{{ $ata->comissao }}</td>
                          
                         

                            <td style="width: 10px;">
                               
                                <a href="{{ route('licita.index', $ata->id) }}" class="btn btn-info">Detalhes</a>    
                            </td> 
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $atasServico->appends($filters)->links() !!}
            @else

            {!! $atasServico->links() !!}
            @endif

        </div>
    </div>
    

@stop

@section('js')
         <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
@stop