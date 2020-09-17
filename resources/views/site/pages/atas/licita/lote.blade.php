@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', "Nº Ata: $ata->nata ")

@section('content_header')

<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
  <li class="breadcrumb-item active"><a href="{{ route('licita.index', $ata->id) }}">Nº Ata {{ $ata->nata }}</a></li>
 </ol>

@stop

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <form action="{{ route('licita.carona') }}" class="form" method="POST">
        @csrf
          @foreach($lotes as $lote)
            <div class="card-header border-transparent">
              <h3 class="card-title"><strong>{{$lote->descricao}}</strong></h3>
            </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr>
                         <th>Objeto</th>
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