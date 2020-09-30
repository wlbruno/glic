@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', 'Pesquisar Ata')

@section('content_header')

 <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><strong>KEY</strong></li>
        </ol>
      </div>
    </div>
<br>

@stop

@section('content')
 <div class="card">
        <div class="card-body">
        	<div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Solicitante</th>
                        <th>Depertamento</th>
                        <th>Nº Ata</th>
                        <th>Nº Pregão</th>
                        <th>Nº Processo</th>
                        <th>Vigencia</th>
                        <th>Tipo</th>
                        <th>Comissão</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @if(!isset($token))
                        <h3>ERRO</h3>
                        @endif
                        <td>{{$token[0]->Carona->User->Solicitante->orgao}}</td>
                        <td>{{$token[0]->Carona->Atas->departamento}}</td>
                        <td>{{$token[0]->Carona->Atas->nata}}</td>
                        <td>{{$token[0]->Carona->Atas->npregao}}</td>
                        <td>{{$token[0]->Carona->Atas->nprocesso}}</td>
                        <td>{{ date( 'd/m/Y', strtotime($token[0]->Carona->Atas->vigencia)) }}</td>
                        <td>{{$token[0]->Carona->Atas->tipo}}</td>
                        <td>{{$token[0]->Carona->Atas->comissao}}</td>       
                    </tr>
                </tbody>
                <thead>
                    <tr>
                       <th>PDF</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="40"><a href="{{ route('download.pdf', $token[0]->Carona->Atas->id) }}">{{ $token[0]->Carona->Atas->arquivo }}</a></td>
                    </tr>
                </tbody>
              </tbody>
            </table>
        </div>
        </div>
    </div>

@stop
