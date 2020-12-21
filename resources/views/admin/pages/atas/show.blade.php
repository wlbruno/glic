@extends('adminlte::page')

@section('title', "Detalhes da Ata ")

@section('content_header')
<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
		  <li class="breadcrumb-item"><a href="{{ route('atas.index') }}"><strong>LISTAGEM DE ATAS</strong></a></li>
            <li class="breadcrumb-item"><strong>DETALHES DA ATA</strong></li>
        </ol>
      </div>
    </div>
<br>
    
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
                        <td>{{ $ata->orgao }}</td>
                        <td width="40"><a href="{{ route('download.pdf', $ata->id) }}">{{ $ata->arquivo }}</a></td>
                        <td>
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-lg">MUDAR PDF</button>  
                        </td>
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
                    @can('remover_ata')
                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>   DELETAR A ATA</button>
                    @endcan
             
                        @can('edit_ata')
                          <a href="{{ route('atas.edit', $ata->id) }}" class="btn btn-warning float-right"><i class="fas fa-edit"></i> EDITAR ATA</a>
                        @endcan
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


        <div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">MUDAR O PDF DA ATA: {{$ata->nata}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
            <form action="{{ route('update.arquivo', $ata->id) }}"  method="POST" enctype="multipart/form-data">
          <div class="modal-body">
              @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="arquivo">ARQUIVO</label>
                      <input type="file" class="form-control"  name="arquivo" required >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success formButton" id="send">Salvar</button>
                  <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cancelar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection