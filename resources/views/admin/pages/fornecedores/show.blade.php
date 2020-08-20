@extends('adminlte::page')

@section('title', "Detalhes do Fornecedor ")

@section('content_header')
  <ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ route('fornecedores.index') }}">Fornecedor</a></li>
         <li class="breadcrumb-item active"><a href="{{ route('fornecedores.show', $fornecedor->id) }}"> {{ $fornecedor->fornecedor }}</a></li>
    </ol>
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
                <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>   DELETAR O FORNECEDOR</button>
                        <a href="http://127.0.0.1:8000/admin/fornecedores" class="btn btn-dark">Voltar</a>
                          
                </form>
              
              </div>
              @endcan

            </div>
          </div>
        </div>



@endsection