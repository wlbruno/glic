@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', "Nº Ata: $atas->nata ")

@section('content_header')

<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item active"><a href="{{ route('licita.index', $atas->id) }}">Nº Ata {{ $atas->nata }}</a></li>
 </ol>

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
                  <th>Vigencia</th>
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
                  <td>{{ $atas->vigencia }}</td>
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
        @foreach($atas->lotes as $lote)
          <div class="card">
             
            <div class="card-body">
             
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title"><strong>{{$lote->descricao}}</strong></h3>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                       <form action="{{ route('licita.carona') }}" class="form" method="POST">
                         @csrf
                         <input type="hidden" name="atas" value="{{$atas->id}}">
                    <table class="table m-0">
                      <thead>
                        @foreach($lote->ItensLote as $lote_item)
                          <tr>
                            <th width="450">Objeto</th>
                            <th width="200">N° E-fisco</th>
                            <th width="450">Fornecedor</th>
                            <th width="200" >N° CNPJ</th>
                            <th>Unidade de medida</th>
                            <th>Valor unitário</th>
                            <th>Quantidade</th>
                            <th width="1000">Solicita</th>
                          </tr>
                        </thead>
                        <tbody>
                         <tr>
                            <td>{{$lote_item->item->objetos->nome}}</td>
                            <td>{{$lote_item->item->objetos->nefisco}}</td>
                            <td>{{$lote_item->item->fornecedores->fornecedor}}</td>
                            <td>{{$lote_item->item->fornecedores->cnpj}}</td>
                            <td>{{$lote_item->item->medida}}</td>
                            <td>{{  'R$ '.number_format($lote_item->item->vunitario, 2, ',', '.') }}</td>        
                            <td>{{$lote_item->item->max}}</td>
                            <td width="300">
                            @php $soma = 0; @endphp
                                @forelse($itens_solicitados as $item_solicitado)
                                    @if($item_solicitado->itens_id == $lote_item->item->id)
                                        @php $soma = $soma + $item_solicitado->quantidade; @endphp
                                            

                                    @endif
                                @empty
                            @endforelse
                                <input type="hidden" name="itens[]" value="{{$lote_item->item->id}}">   
                                    @if($soma > 0)
                                        <input  id="solicita"  type="number" class="form-control" min="0" name="qtd_itens[]"  max="{{$lote_item->item->max - $soma}}" placeholder="..." >

                                    @else
                                        <input id="solicita" type="number" class="form-control" min="0" name="qtd_itens[]"  max="{{$lote_item->item->max}}" placeholder="..." >
                                    @endif
                                    <div class="progress progress-xs" >
                                           <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$soma}}" aria-valuemin="0" aria-valuemax="{{$lote_item->item->max}}" style="width: {!! (100 * $soma)/ $lote_item->item->max !!}%">

                                        </div>
                                    </div>   <span >Você já solicitou {{$soma}} itens. Isso significa <b>{!! number_format((100 * $soma)/ $lote_item->item->max) !!}%</b> da quantidade total.</span>
                            </td>     
                         </tr>
                        @endforeach
                      </tbody>
                      </div>
                    </table>           
                  <div class="card-footer">
                  <button type="submit" class="btn btn-success float-right">SOLICITAR</button>
              </div>
          </form>
                  </div>
                </div>
            </div>
        </div>
      @endforeach
    </div>
              
  </div>
@stop