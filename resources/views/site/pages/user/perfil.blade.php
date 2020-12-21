@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', 'Perfil ')

@section('content_header')


<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active"><strong>PÁGINA DE PERFIL</strong></li>
        </ol>
      </div>
    </div>
<br>

@stop

@section('content')
  @if (session('success'))
        <div class="alert alert-success">
              {{ session('success') }}
          </div>
    @endif

    @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
    @endif
     
<div class="row">
    <div class="col-md-8">
        <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Olá, Bem vindo ao seu perfil {{ auth()->user()->name }}</h5>
                  Aqui você pode trocar sua senha ou seu e-mail.
                </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Atualizar Perfil</h3>
              </div>
              <form action="{{ route('perfil.update') }}" method="POST">
                 {{ method_field('PUT') }}
                 @csrf
                
                <div class="card-body">
                  
                  <div class="form-group">
                       <label for="novoemail">Alterar E-mail:</label>
                    <input type="email" class="form-control" name="email" placeholder="{{auth()->user()->email}}">
                  </div>
                  
                  <div class="form-group">
                    <label for="confirmaemail">Confirmar  E-mail:</label>
                    <input type="email" class="form-control" name="confirmaemail" placeholder="{{auth()->user()->email}}">
                  </div>
                  
                  <div class="form-group">
                        <label for="novasenha">Nova Senha:</label>
                    <input type="password" class="form-control" name="senha" placeholder="Nova senha">
                  </div>

                  <div class="form-group">
                   <label for="cnovasenha">Confirmar Nova Senha:</label>
                    <input type="password" class="form-control" name="confirmar_nova_senha" placeholder="Confirmar nova senha">
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

              </form>
            </div>
    </div>
</div>
@stop