@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><strong>DASHBOARD</strong></a></li>
            <li class="breadcrumb-item"><strong>USUÁRIOS</strong></li>
        </ol>
      </div>
    </div>
<br>

@stop

@section('content')
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
          <div class="inner">
            <p style="text-align: center;font-size: 26px">Usuários sem permissões</p>
            <p style="text-align: center;font-size: 26px"><strong>({{$userSemPermissao}})</strong></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
            <a href="{{ route('users.pendentes') }}" class="small-box-footer">ACESSAR &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-secondary">
            <div class="inner">
              <p style="text-align: center;font-size: 26px">Usuários com permissões</p>
              <p style="text-align: center;font-size: 26px"><strong>({{$userComPermissao}})</strong></p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
              <a href="{{ route('users.permitidos') }}" class="small-box-footer">ACESSAR &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <p style="text-align: center;font-size: 26px">Órgão participantes</p>
                <p style="text-align: center;font-size: 26px"><strong>({{$orgao}})</strong></p>
              </div>
              <div class="icon">
                  <i class="ion ion-bag"></i>
              </div>
                <a href="{{ route('users.orgao') }}" class="small-box-footer">ACESSAR &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
      </div>
@stop 
