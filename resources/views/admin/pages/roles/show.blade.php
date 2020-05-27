@extends('adminlte::page')

@section('title', "Detalhes do cargo {$role->name}")

@section('content_header')

  <ol class="breadcrumb float-sm-right">
     
       <li class="breadcrumb-item "><a href="#">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('roles.index') }}" class="active">Permissões</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.show', $role->id) }}" class="active">{{ $role->name }}</a></li>
    </ol>


    <h1>Detalhes do cargo <b>{{ $role->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $role->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $role->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')
             @can('admin')
            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O CARGO: {{ $role->name }}</button>
            </form>
              @endcan
        </div>
    </div>
@endsection
