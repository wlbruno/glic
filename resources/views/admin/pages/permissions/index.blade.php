@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>

    <h1>Perfis <a href="{{ route('permissions.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Filtrar" class="form-control" value="{{ $filters['filter'] ?? ''  }}">
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="290">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permissison)
                        <tr>
                            <td>
                                {{ $permissison->name }}
                            </td>
                         
                            <td style="width: 10px;">
                                <a href="{{ route('permissions.edit', $permissison->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('permissions.show', $permissison->id) }}" class="btn btn-warning">VER</a> 
                                <a href="{{ route('permissions.profiles', $permissison->id) }}" class="btn btn-dark"><i class="fas fa-address-book"></i></a>     
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else

            {!! $permissions->links() !!}
            @endif

        </div>
    </div>
@stop