@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', 'Atas Solicitadas')

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
                          <td>{{$caronas[0]->Atas->departamento}}</td>
                          <td>{{$caronas[0]->Atas->descricao}}</td>
                          <td>{{$caronas[0]->Atas->nata}}</td>
                          <td>{{$caronas[0]->Atas->npregao}}</td>
                          <td>{{$caronas[0]->Atas->nprocesso}}</td>
                           <td>{{ date( 'd/m/Y', strtotime($caronas[0]->Atas->vigencia)) }}</td>
                          <td>{{$caronas[0]->Atas->tipo}}</td>
                          <td>{{$caronas[0]->Atas->comissao}}</td>       
                       </tr>
                   
                </tbody>
            </table>
        </div>
        </div>
    </div>

@stop
