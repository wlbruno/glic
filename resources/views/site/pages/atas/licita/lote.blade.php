@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', "Nº Ata: $ata->nata ")

@section('content_header')
@include('admin.includes.alerts')

<div class="row">
  <div class="col-md-12">
    <ol class="breadcrumb float-sm-left">
      <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
        @if($ata->departamento === 'MEDICAMENTOS')
          <li class="breadcrumb-item"><a href="{{route('atas.medicamentos')}}"><strong>ATAS DE MEDICAMENTOS</strong></a></li>
        @endif
        @if($ata->departamento === 'PRODUTOS MÉDICOS')
          <li class="breadcrumb-item"><a href="{{route('atas.produtos')}}"><strong>ATAS DE PRODUTOS MÉDICOS</strong></a></li>
        @endif
        @if($ata->departamento === 'AQUISIÇÕES EM GERAL')
            <li class="breadcrumb-item"><a href="{{route('atas.aquisicao')}}"><strong>ATAS DE AQUISIÇÕES EM GERAL</strong></a></li>
        @endif
        @if($ata->departamento === 'SERVIÇOS EM GERAL')
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
                  <td>{{ $ata->departamento }}</td>
                  <td>{{ $ata->nata }}</td>
                  <td>{{ $ata->npregao }}</td>
                  <td>{{ $ata->nprocesso }}</td>
                  <td>{{ date( 'd/m/Y', strtotime($ata->data_vigencia)) }}</td>
                  <td>{{ $ata->tipo }}</td>
                  <td>{{ $ata->comissao }}</td>
                  <td width="40"><a href="{{ route('download.pdf', $ata->id) }}">{{ $ata->arquivo }}</a></td>
                 </tr>
                </tbody>
              </table>
              <table class="table table-head-fixed">
                <thead>
                  <th> Descrição</th>
                  <th>Fornecedor</th>
						      <th>CNPJ</th>
                </thead>
                <tbody>
                  <td>{{ $ata->descricao }}</td>
                  <td>{{ $ata->lotes[0]->ItensLote[0]->item->fornecedores->fornecedor }}</td>
						      <td>{{ $ata->lotes[0]->ItensLote[0]->item->fornecedores->cnpj }}</td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('licita.carona') }}"  class="form" method="POST">
            <input type="hidden" value="{{$ata->id}}" name="atas" class="form-control">
              @csrf
                <div class="card">
                  @foreach($lotes as $lote)
                    <div class="card-header border-transparent">
                      <h3 class="card-title"><strong>{{$lote->descricao}}</strong></h3>
                    </div>
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table m-0">
                          <thead>
                            <tr>
                              <th width="300">Objeto</th>
                              <th width="150" >N° E-fisco</th>
                              <!--  <th>Fornecedor</th>
                              <th>N° CNPJ</th> -->
                              <th>Unidade de medida</th>
                              <th>Valor unitário</th>
                              <th>Disponível</th>
                                @if($ata->tipo === "ITEM")
                              <th>Solicita</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($lote->ItensLote as $lote_item)
                            <tr>
                              <td>{{$lote_item->item->objetos->nome}}</td>
                              <td>{{$lote_item->item->objetos->nefisco}}</td>
                              <!--    <td>{{$lote_item->item->fornecedores->fornecedor}}</td>
                              <td>{{$lote_item->item->fornecedores->cnpj}}</td> -->
                              <td>{{$lote_item->item->medida}}</td>
                              <td>{{$lote_item->item->vunitario}}</td>

                                  @php $soma = 0; @endphp
                                    @forelse($itens_solicitados as $item_solicitado)
                                      @if($item_solicitado->itens_id == $lote_item->item->id)
                                        @php $soma = $soma + $item_solicitado->quantidade; @endphp
                              
                                    @endif
                                    @empty
                                  @endforelse
                        
                              <td>{{  ' '.number_format($lote_item->item->quantidadeONP - $soma, 0 , ',',  '.') }}</td>     
                              <td> 
                                <input type="hidden" name="itens[]" value="{{$lote_item->item->id}}">   
                                  @if($soma > 0 )
                                    <input  id="solicita"  type="text" required class="form-control" min="0" name="qtd_itens[]" 
                                      max="{{$lote_item->item->quantidadeONP - $soma}}" placeholder="..." >
                                  @else
                                    <input id="solicita" type="text" required class="form-control" min="0" name="qtd_itens[]"  
                                     max="{{$lote_item->item->quantidadeONP - $soma}}" placeholder="..." >
                                  @endif
                                    <div class="progress progress-xs" >
                                      <div class="progress-bar progress-bar-success progress-bar-striped" 
                                            role="progressbar" aria-valuenow="{{$soma}}" aria-valuemin="0"
                                            aria-valuemax="{{ $lote_item->item->quantidadeONP }}" 
                                            style="width: {!! number_format((100 * $soma)/ $lote_item->item->quantidadeONP) !!}%">
                                      </div>
                                    </div>  
                                     <span >Você já solicitou {{$soma}} itens. Isso significa
                                           <b>{!! number_format((100 * $soma)/ $lote_item->item->quantidadeONP) !!}%
                                           </b> da quantidade total <b>{{$lote_item->item->quantidadeONP}}</b>.
                                      </span>
                                  </td>     
                                </tr>
                              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                @endforeach
                  <div class="card-footer clearfix">
                  @if($ata->tipo == "ITEM")
                    <button type="submit"  id="botao" disabled="disabled" class="btn btn-sm btn-info float-right">SOLICITAR</button>
                  @else()
                  <button type="submit"  id="botao"  class="btn btn-sm btn-info float-right">SOLICITAR</button>
                  @endif
                  </div>
                </div>
              </form>
            </div>
          </div>

@stop

@section('js')

<script>
// Mantém os inputs em cache:
var inputs = $('input');
// Chama a função de verificação quando as entradas forem modificadas
// Usei o 'keyup', mas 'change' ou 'keydown' são também eventos úteis aqui
inputs.on('keyup', verificarInputs);
function verificarInputs() {
    var preenchidos = true;  // assumir que estão preenchidos
    inputs.each(function () {
        // verificar um a um e passar a false se algum falhar
        // no lugar do if pode-se usar alguma função de validação, regex ou outros
        if (!this.value) {
          preenchidos = true;
          // parar o loop, evitando que mais inputs sejam verificados sem necessidade
          return true;
        }
    });
    // Habilite, ou não, o <button>, dependendo da variável:
    $('button').prop('disabled', !preenchidos); // 
}
</script>
@endsection