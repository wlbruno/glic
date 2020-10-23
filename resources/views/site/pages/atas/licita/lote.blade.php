@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', "Nº Ata: $ata->nata ")

@section('content_header')
 
 <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active"><a href="{{ route('licita.index', $ata->id) }}"><strong>LISTAGEM DE LOTES</strong></a></li>
            <li class="breadcrumb-item"><strong>ITENS</strong></li>
        </ol>
      </div>
    </div>
<br>


@stop

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <form action="{{ route('licita.carona') }}"  class="form" method="POST">
        @csrf
        <input type="hidden" value="{{$ata->id}}" name="atas" class="form-control">
          @foreach($lotes as $lote)
            <div class="card-header border-transparent">
              <h3 class="card-title"><strong>{{$lote->descricao}}</strong></h3>
            </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr>
                         <th width="200">Objeto</th>
                         <th>N° E-fisco</th>
                         <th>Fornecedor</th>
                         <th>N° CNPJ</th>
                         <th>Unidade de medida</th>
                         <th>Valor unitário</th>
                         <th>Quantidade</th>
                          <th>Solicita</th>
                      </tr>
                    </thead>
                  <tbody>
                    @foreach($lote->ItensLote as $itens)
                      <tr>
                        <td>{{$itens->item->objetos->nome}}</td>  
                        <td>{{$itens->item->objetos->nefisco}}</td> 
                        <td>{{$itens->item->fornecedores->fornecedor}}</td> 
                        <td>{{$itens->item->fornecedores->cnpj}}</td> 
                        <td>{{$itens->item->medida}}</td> 
                        <td>{{  'R$ '.number_format($itens->item->vunitario, 2, ',', '.') }}</td> 
                        <td>{{$itens->item->max}}</td> 
                        <td>
                        @php $soma = 0; @endphp
                                    @forelse($itens_solicitados as $item_solicitado)
                                      @if($item_solicitado->itens_id == $itens->item->id)
                                        @php $soma = $soma + $item_solicitado->quantidade; @endphp
                                    @endif
                                    @empty
                                  @endforelse
                                    <input type="hidden" name="itens[]" value="{{$itens->item->id}}">   
                                    @if($soma > 0 )
                                        <input  id="solicita"  type="number" class="form-control" min="0" name="qtd_itens[]" required max="{{$itens->item->max}}" placeholder="..." >
                                      @else
                                        <input id="solicita" type="number" class="form-control" min="0" name="qtd_itens[]" required max="{{$itens->item->max}}" placeholder="..." >
                                      @endif
                                        <div class="progress progress-xs" >
                                          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$soma}}" aria-valuemin="0" aria-valuemax="{{$itens->item->value}}" style="width: {!! (100 * $soma)/ $itens->item->value !!}%">
                                        </div>
                                      </div>   <span >Você já solicitou {{$soma}} itens. Isso significa <b>{!! number_format((100 * $soma)/ $itens->item->value) !!}%</b> da quantidade total <b>{{$itens->item->value}}</b>.</span>
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
      </form>
    </div>
  </div>
</div>
  

@endsection