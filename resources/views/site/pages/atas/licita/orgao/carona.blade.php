@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', "Nº Ata: $atas->nata ")

@section('content_header')
@include('admin.includes.alerts')
<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('orgao.index') }}"><strong>ATAS PARA ORGÃO</strong></a></li>
          <li class="breadcrumb-item"><strong>{{ $atas->departamento }}</strong></li>
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
                  <td>{{ $atas->descricao }}</td>
                  <td>{{ $atas->lotes[0]->ItensLote[0]->item->fornecedores->fornecedor }}</td>
						      <td>{{ $atas->lotes[0]->ItensLote[0]->item->fornecedores->cnpj }}</td>
                </tbody>
              </table>
              <table class="table table-head-fixed">
                <thead>
                  <tr>
                    <th>PDF</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                    <td><a href="{{ route('download.pdf', $atas->id) }}">{{ $atas->arquivo }}</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

                      <!-- TABELA DE ITENS/LOTE DA ATA -->
        
<div class="row">
  <div class="col-md-12">
    @if($atas->tipo === 'ITEM')
      <form action="{{ route('licita.carona.orgao') }}"  class="form" method="POST">
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
                        <th width="150" >N° E-fisco</th>
                        <!--  <th>Fornecedor</th>
                               <th>N° CNPJ</th> -->
                        <th>Marca</th>
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
                      <input type="hidden" value="{{$lote_item->item->orgaos[0]->id}}"  name="orgao_id" class="form-control">
                      
                        <tr>
                          <td>{{$lote_item->item->objetos->nome}}</td>
                          <td>{{$lote_item->item->objetos->nefisco}}</td>
                          <!--    <td>{{$lote_item->item->fornecedores->fornecedor}}</td>
                                  <td>{{$lote_item->item->fornecedores->cnpj}}</td> -->
                          <td>{{$lote_item->item->marca}}</td>
                          <td>{{$lote_item->item->medida}}</td>
                          <td>{{ $lote_item->item->vunitario }}</td>  
                          <td>{{ ''.number_format($lote_item->item->orgaos[0]->saldo, 0, ',', '.') }} </td> 
                         

                            @php $soma = 0; @endphp
                              @forelse($itens_solicitados as $item_solicitado)
                                @if($item_solicitado->itens_id == $lote_item->item->id)
                                  @php $soma = $soma + $item_solicitado->quantidade; @endphp
                                @endif
                                  @empty
                                @endforelse
                                
                              
                                @if($atas->tipo === "ITEM")
                                  <td> 
                                    <input type="hidden" name="itens[]" value="{{$lote_item->item->id}}">   
                                      @if($soma > 0 )
                                        <input  id="solicita"  type="number" class="form-control" min="0" name="qtd_itens[]"   max="{{ $lote_item->item->orgaos[0]->saldo }}" placeholder="..." >
                                      @else
                                        <input id="solicita" type="number" class="form-control" min="0" name="qtd_itens[]"   max="{{ $lote_item->item->orgaos[0]->saldo }}" placeholder="..." >
                                      @endif
                                        <div class="progress progress-xs">
                                          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$soma}}" aria-valuemin="0" aria-valuemax="{{ $lote_item->item->orgaos[0]->quantidade }}" style="width: {!! (100 * $soma)/  $lote_item->item->orgaos[0]->quantidade !!}%">
                                          </div>
                                        </div> 
                                         <span>Você já solicitou {{$soma}} itens. Isso significa
                                            <b>{!! number_format((100 * $soma)/ $lote_item->item->orgaos[0]->quantidade ) !!}%
                                            </b> da quantidade total <b>{{ ''.number_format($lote_item->item->orgaos[0]->saldo, 0, ',', '.') }} </b>.
                                         </span>
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
                @if($atas->tipo == "ITEM")
                  <button type="submit"  id="botao" disabled="disabled" class="btn btn-sm btn-info float-right">SOLICITAR</button>
                @else()
                  <button type="submit"  id="botao"  class="btn btn-sm btn-info float-right">SOLICITAR</button>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection
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