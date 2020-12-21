@extends('adminlte::page')

@section('title', "Permissões do usuário {$user->name}")

@section('content_header')
<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}"><strong>LISTAGEM DE USUÁRIOS</strong></a></li>
          <li class="breadcrumb-item"><strong>PERMISSÕES DO USUÁRIO {{$user->name}}</strong></li>
        </ol>
      </div>
    </div>
<br>



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
