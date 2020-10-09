@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', "Nº Ata: $atas->nata ")

@section('content_header')

<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          @if($atas->departamento === 'MEDICAMENTOS')
          <li class="breadcrumb-item"><a href="{{route('atas.medicamentos')}}"><strong>ATAS DE MEDICAMENTOS</strong></a></li>
          @endif
          @if($atas->departamento === 'PRODUTOS MÉDICOS')
          <li class="breadcrumb-item"><a href="{{route('atas.produtos')}}"><strong>ATAS DE PRODUTOS MÉDICOS</strong></a></li>
            @endif
            @if($atas->departamento === 'AQUISIÇÕES EM GERAL')
            <li class="breadcrumb-item"><a href="{{route('atas.aquisicao')}}"><strong>ATAS DE AQUISIÇÕES EM GERAL</strong></a></li>
            @endif
            @if($atas->departamento === 'SERVIÇOS EM GERAL')
            <li class="breadcrumb-item"><a href="{{route('atas.servicos')}}"><strong>ATAS DE SERVIÇOS EM GERAL</strong></a></li>
            @endif
            <li class="breadcrumb-item"><strong>SOLICITAR ATA</strong></li>
        </ol>
      </div>
    </div>
<br>

@stop

@section('content')
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed">
              <thead>
                <tr>
                  <th>Departamento</th>
                  <th>Nº Ata</th>
                  <th>Nº Pregão</th>
                  <th>Nº Processo</th>
                  <th>Vigência</th>
                  <th>Tipo</th>
                  <th>Comissão</th>
                  <th>PDF</th>
                </tr>
               </thead>
               <tbody>
                <tr>
                  <td>{{ $atas->departamento }}</td>
                  <td>{{ $atas->nata }}</td>
                  <td>{{ $atas->npregao }}</td>
                  <td>{{ $atas->nprocesso }}</td>
                  <td>{{ date( 'd/m/Y', strtotime($atas->data_vigencia)) }}</td>
                  <td>{{ $atas->tipo }}</td>
                  <td>{{ $atas->comissao }}</td>
                  <td width="40"><a href="{{ route('download.pdf', $atas->id) }}">{{ $atas->arquivo }}</a></td>
                 </tr>
                </tbody>
              </table>
              <table class="table table-head-fixed">
                <thead>
                   <th> Descrição</th>
                </thead>
                <tbody>
                  <td>{{ $atas->descricao }}</td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          @if($atas->tipo === 'ITEM')
            <form action="{{ route('licita.carona') }}" target="_blank" class="form" method="POST">
          @else
            <form action="{{ route('licita.lote', $atas->id) }}" class="form" method="POST">
          @endif
            <input type="hidden" value="{{$atas->id}}" name="atas" class="form-control">
            @csrf
             <div class="card">
                @foreach($atas->lotes as $lote)
                  <div class="card-header border-transparent">
                  <h3 class="card-title"><strong>{{$lote->descricao}}</strong></h3>
                  
                        <div class="card-tools">
                          @if($atas->tipo === "LOTE")
                            <div class="form-check">
                              <input class="form-check-input" name="lotes[]" value="{{$lote->id}}" type="checkbox">
                              <label class="form-check-label"><strong>Você desejar solicitar esse lote?</strong></label>
                            </div>
                          @endif
                        </div>
                      </div>
                    <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr>
                          <th width="300">Objeto</th>
                            <th>N° E-fisco</th>
                            <th>Fornecedor</th>
                            <th>N° CNPJ</th>
                            <th>Unidade de medida</th>
                            <th>Valor unitário</th>
                            <th>Disponível</th>
                              @if($atas->tipo === "ITEM")
                                <th>Solicita</th>
                              @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($lote->ItensLote as $lote_item)
                            <tr>
                              <td>{{$lote_item->item->objetos->nome}}</td>
                              <td>{{$lote_item->item->objetos->nefisco}}</td>
                              <td>{{$lote_item->item->fornecedores->fornecedor}}</td>
                              <td>{{$lote_item->item->fornecedores->cnpj}}</td>
                              <td>{{$lote_item->item->medida}}</td>
                              <td>{{  'R$ '.number_format($lote_item->item->vunitario, 2, ',', '.') }}</td>        
                              <td>{{$lote_item->item->max}}</td>
                              
                              <td> 
                                @if($atas->tipo === "ITEM")
                                  @php $soma = 0; @endphp
                                    @forelse($itens_solicitados as $item_solicitado)
                                      @if($item_solicitado->itens_id == $lote_item->item->id)
                                        @php $soma = $soma + $item_solicitado->quantidade; @endphp
                                  
                                    @endif
                                    @empty
                                  @endforelse
                                    <input type="hidden" name="itens[]" value="{{$lote_item->item->id}}">   
                                      @if($soma > 0 )
                                        <input  id="solicita"  type="number" class="form-control" min="0" name="qtd_itens[]"   max="{{$lote_item->item->max}}" placeholder="..." >
                                      @else
                                        <input id="solicita" type="number" class="form-control" min="0" name="qtd_itens[]"   max="{{$lote_item->item->max}}" placeholder="..." >
                                      @endif
                                        <div class="progress progress-xs" >
                                          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$soma}}" aria-valuemin="0" aria-valuemax="{{$lote_item->item->value}}" style="width: {!! (100 * $soma)/ $lote_item->item->value !!}%">
                                        </div>
                                      </div>   <span >Você já solicitou {{$soma}} itens. Isso significa <b>{!! number_format((100 * $soma)/ $lote_item->item->value) !!}%</b> da quantidade total <b>{{$lote_item->item->value}}</b>.</span>
                                    @endif
                                  </td>     
                                </tr>
                              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                @endforeach
                  <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-sm btn-info float-right">SOLICITAR</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

@stop