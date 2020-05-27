@extends('adminlte::page')

@section('title', 'Cadastrar Novo Cargo')

@section('content_header')	
	<ol class="breadcrumb">
     
       <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" class="active">Permissões</a></li>
    </ol>
    
    <h1>Cadastrar Novo Cargo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" class="form" method="POST">
                @include('admin.pages.roles._partials.form')
            </form>
        </div>
    </div>
@endsection
