@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
    </ol>

    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? ''  }}">
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
                    @foreach($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            
                            <td style="width: 10px;">
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">VER</a>
                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning"><i class="fas fa-address-book"></i></a>    
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else

            {!! $plans->links() !!}
            @endif

        </div>
    </div>
@stop