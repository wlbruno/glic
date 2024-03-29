@extends('adminlte::page')

@section('title', "Detalhes do Fornecedor ")

@section('content_header')
<div class="row">
  <div class="col-md-12">
  <ol class="breadcrumb float-sm-left">
    <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
        <li class="breadcrumb-item "><a href="{{ route('fornecedores.index') }}"><strong>LISTAGEM DE FORNECEDORES</strong></a></li>
         <li class="breadcrumb-item"><strong>{{ $fornecedor->fornecedor }}</strong></li>
      </ol>
    </div>
  </div>
    <h1>Detalhes do Fornecedor  <b>{{ $fornecedor->nome }}</b> </h1>
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
                        <th>Nome</th>
                        <th>CNPJ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <td>{{ $fornecedor->fornecedor }}</td>
                       <td>{{ $fornecedor->cnpj }}</td>
                    </tr>
                   </tbody>
                </table>
               
              </div>
              @can('remover_fornecedores')
            <div class="card-footer">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                  <i class="fas fa-trash"></i> DELETAR O FORNECEDOR
                </button>
                      
                        <a href="{{ route('fornecedores.index') }}" class="btn btn-dark">Voltar</a>
                          
            

              
              </div>
              @endcan

            </div>
          </div>
        </div>

<div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tem certeza que deseja deletar o fornecedor?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
 <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR</button>
                  </form>

            </div>
         
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@endsection