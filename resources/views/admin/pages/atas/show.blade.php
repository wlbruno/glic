@extends('adminlte::page')

@section('title', "Detalhes da Ata ")

@section('content_header')
  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('atas.index') }}">Atas</a></li>
         <li class="breadcrumb-item active"><a href="{{ route('atas.show', $ata->id) }}">Nº Ata {{ $ata->nata }}</a></li>
    </ol>
    <h1>Detalhes da Ata  <b>{{ $ata->nata }}</b> </h1>
@stop

@section('content')
 @include('admin.includes.alerts')
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
                        <th>Órgão</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>{{ $ata->departamento }}</td>
                        <td>{{ $ata->nata }}</td>
                        <td>{{ $ata->npregao }}</td>
                        <td>{{ $ata->nprocesso }}</td>
                        <td>{{ $ata->vigencia }}</td>
                        <td>{{ $ata->tipo }}</td>
                        <td>{{ $ata->comissao }}</td>
                        <td>{{ $ata->orgao }}</td>
                    </tr>
                   </tbody>
                </table>
                <table class="table table-head-fixed">
                    <thead>
                        <th> Descrição</th>
                    </thead>
                    <tbody>
                        <td>{{ $ata->descricao }}</td>
                    </tbody>
                </table>
              </div>
            <div class="card-footer">
                <form action="{{ route('atas.destroy', $ata->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>   DELETAR A ATA</button>
                            @if($ata->tipo == 'LOTE')
                                <a href="{{ route('lotes.create', $ata->id) }}" class="btn btn-info float-right">LOTES</a>
                            @else 
                                <a href="{{ route('lotes.create', $ata->id) }}" class="btn btn-info float-right">ITENS</a>
                            @endif
                </form>
              
              </div>

            </div>
          </div>
        </div>



@endsection