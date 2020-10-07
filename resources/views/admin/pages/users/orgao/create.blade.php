@extends('adminlte::page')

@section('title', 'Cadastrar Novo Órgão')

@section('content_header')
    <h1>Cadastrar Novo Órgão Participante</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection
