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
        <form action="{{ route('objetos.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nº E-fisco ou Nome" class="form-control" value="{{ $filters['filter'] ?? ''  }}">
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
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($objetos as $objeto)
                        <tr>
                            <td>{{ $objeto->nome }}</td>
                            <td>{{ $objeto->nefisco }}</td>
                           
                           
                           
                            <td>
                                @can('edit_objetos')
                                <a href="{{ route('objetos.edit', $objeto->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> EDITAR</a>
                                @endcan
                                <a href="{{ route('objetos.show', $objeto->id) }}" class="btn btn-info"><i class="fas fa-search"></i> DETALHAR</a>    
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


@section('js')
         <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
@stop
