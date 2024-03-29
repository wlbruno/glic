@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb float-sm-right">
     
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" class="active">Permissões</a></li>
    </ol>

    <h1>Permissões 
         @can('admin')
        <a href="{{ route('roles.create') }}" class="btn btn-dark">ADD</a>
        @endcan 
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('roles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">&nbsp;
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td style="width=10px;">
                                @can('admin')
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">EDITAR</a>
                                @endcan
                                <hr>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning">DETALHAR</a>
                                @can('admin')
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif
        </div>
    </div>
@stop
