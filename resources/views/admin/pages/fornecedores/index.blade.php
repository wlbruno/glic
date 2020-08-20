@extends('adminlte::page')

@section('title', 'Fornecedores')

@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('fornecedores.index') }}">Fornecedores</a></li>
    </ol>
</nav>

    <h1>Fornecedores 
        @can('add_fornecedores')
        <a href="{{ route('fornecedores.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a>
        @endcan
    </h1>

@stop

@section('content')
 <div class="card">
        <div class="card-header">
        <form action="{{ route('atas.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nº Ata ou Nº Processo" class="form-control" value="{{ $filters['filter'] ?? ''  }}">
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->fornecedor }}</td>
                            <td>{{ $fornecedor->cnpj }}</td>
                           
                           
                           
                            <td style="width: 10px;">
                                @can('edit_fornecedores')
                                <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> EDITAR</a>
                                @endcan
                                <a href="{{ route('fornecedores.show', $fornecedor->id) }}" class="btn btn-info"><i class="fas fa-search"></i> DETALHAR</a>    
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