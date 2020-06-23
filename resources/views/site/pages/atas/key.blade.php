@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', 'Pesquisar Ata')

@section('content_header')

<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active" ><a href="/">Home</a></li>
 </ol>

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
                           <td>{{$tokens[0]->Carona->User->Solicitante->orgao}}</td>
                          <td>{{$tokens[0]->Carona->Atas->departamento}}</td>
                          <td>{{$tokens[0]->Carona->Atas->descricao}}</td>
                          <td>{{$tokens[0]->Carona->Atas->nata}}</td>
                          <td>{{$tokens[0]->Carona->Atas->npregao}}</td>
                          <td>{{$tokens[0]->Carona->Atas->nprocesso}}</td>
                           <td>{{ date( 'd/m/Y', strtotime($tokens[0]->Carona->Atas->vigencia)) }}</td>
                          <td>{{$tokens[0]->Carona->Atas->tipo}}</td>
                          <td>{{$tokens[0]->Carona->Atas->comissao}}</td>       
                       </tr>
                   
                </tbody>
            </table>
        </div>
        </div>
    </div>

@stop
