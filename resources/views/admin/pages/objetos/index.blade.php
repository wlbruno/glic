@extends('adminlte::page')

@section('title', 'Objetos')

@section('content_header')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('objetos.index') }}">Objetos</a></li>
    </ol>
</nav>

    <h1>Objetos 
        @can('add_objetos')
        <a href="{{ route('objetos.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a>
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
                        <th>Nº EFISCO</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($objetos as $objeto)
                        <tr>
                            <td>{{ $objeto->nome }}</td>
                            <td>{{ $objeto->nefisco }}</td>
                           
                           
                           
                            <td style="width: 10px;">
                                @can('edit_objetos')
                                <a href="{{ route('objetos.edit', $objeto->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                @endcan
                                <a href="{{ route('objetos.show', $objeto->id) }}" class="btn btn-info"><i class="fas fa-search"></i></a>    
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $objetos->appends($filters)->links() !!}
            @else

            {!! $objetos->links() !!}
            @endif

        </div>
    </div>
@stop