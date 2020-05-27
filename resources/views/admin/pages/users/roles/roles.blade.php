@extends('adminlte::page')

@section('title', "Permissões do usuário {$user->name}")

@section('content_header')
    <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="active">Users</a></li>
    </ol>

    <h1>Permissões do usuário <strong>{{ $user->name }}</strong></h1>
    @can('add_permissoes')
    <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-dark">ADD NOVA PERMISSÃO</a>
    @endcan

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td style="width=10px;">
                                @can('remover_permissoes')
                                <a href="{{ route('users.role.detach', [$user->id, $role->id]) }}" class="btn btn-danger">DESVINCULAR</a>
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
