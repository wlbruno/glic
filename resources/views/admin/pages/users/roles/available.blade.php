@extends('adminlte::page')

@section('title', "Permissões disponíveis cargo {$user->name}")

@section('content_header')

    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}"><strong>LISTAGEM DE USUÁRIOS</strong></a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.roles', $user->id) }}"><strong>PERMISSÕES DO USUÁRIO {{$user->name}}</strong></a></li>
          <li class="breadcrumb-item"><strong>PERMISSÕES DISPONÍVEIS PARA O USUÁRIO {{ $user->name }}</strong></li>
        </ol>
      </div>
    </div>
<br>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.roles.available', $user->id) }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('users.roles.attach', $user->id) }}" method="POST">
                        @csrf
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                </td>
                                <td>
                                    {{ $role->name }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')

                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
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
