@extends('adminlte::page')

@section('title', 'Fornecedores')

@section('content_header')
<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
            <li class="breadcrumb-item"><strong>FORNECEDORES</strong></li>
        </ol>
      </div>
    </div>
<br>

    <h1> 
        @can('add_fornecedores')
        <a href="{{ route('fornecedores.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a>
        @endcan
    </h1>

@stop

@section('content')
 <div class="card">
        <div class="card-header">
        <form action="{{ route('fornecedores.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Fornecedor ou Nº CNPJ" class="form-control" value="{{ $filters['filter'] ?? ''  }}">&nbsp;
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="1000">NOME</th>
                        <th>CNPJ</th>
                        <th width="250">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->fornecedor }}</td>
                            <td>{{ $fornecedor->cnpj }}</td>
                           
                           
                           
                            <td>
                                @can('edit_fornecedores')
                                <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-dark"><i class="fas fa-edit"></i> EDITAR</a>
                                @endcan
                                <a href="{{ route('fornecedores.show', $fornecedor->id) }}" class="btn btn-dark"><i class="fas fa-search"></i> DETALHAR</a>    
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $fornecedores->appends($filters)->links() !!}
            @else

            {!! $fornecedores->links() !!}
            @endif

        </div>
    </div>
@stop