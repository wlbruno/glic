@extends('adminlte::page')

@section('title', "Detalhes do objeto ")

@section('content_header')
  <ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ route('objetos.index') }}">Objetos</a></li>
         <li class="breadcrumb-item active"><a href="{{ route('objetos.show', $objeto->id) }}">Objeto {{ $objeto->nome }}</a></li>
    </ol>
    <h1>Detalhes do objeto  <b>{{ $objeto->nome }}</b> </h1>
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
                        <th>Nº EFISCO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <td>{{ $objeto->nome }}</td>
                       <td>{{ $objeto->nefisco }}</td>
                    </tr>
                   </tbody>
                </table>
               
              </div>
              @can('remover_objetos')
            <div class="card-footer">
                <form action="{{ route('objetos.destroy', $objeto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>   DELETAR A ATA</button>
                          
                </form>
              
              </div>
              @endcan

            </div>
          </div>
        </div>



@endsection