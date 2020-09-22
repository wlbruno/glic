@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', 'Atas Solicitadas')

@section('content_header')

<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" ><a href="/"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" ><a href="{{ route('user.historico') }}">Página de atas Solicitadas</a></li>
 </ol>

@stop

@section('content')
    @forelse($caronas as  $carona)
        <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Depertamento</th>
                                <th>Descrição</th>
                                <th>Nº Ata</th>
                                <th>Nº Pregão</th>
                                <th>Nº Processo</th>
                                <th>Vigencia</th>
                                <th>Tipo</th>
                                <th>Comissão</th>
                                <th>PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>{{$carona->Atas->departamento}}</td>
                              <td>{{$carona->Atas->descricao}}</td>
                              <td>{{$carona->Atas->nata}}</td>
                              <td>{{$carona->Atas->npregao}}</td>
                              <td>{{$carona->Atas->nprocesso}}</td>
                              <td>{{ date( 'd/m/Y', strtotime($carona->Atas->vigencia)) }}</td>
                              <td>{{$carona->Atas->tipo}}</td>
                              <td>{{$carona->Atas->comissao}}</td>    
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            @empty
            <div class="callout callout-info">
                  <h5>Historico de atas</h5>

                  <p> Você ainda não realizou uma solicitação de atas, quando realizar suas atas ficarão visiveis aqui</p>
                </div>
       
	  @endforelse 

        @stop
