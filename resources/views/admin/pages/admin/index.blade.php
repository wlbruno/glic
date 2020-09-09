@extends('adminlte::page')

@section('title', 'Atas')

@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="/home">Site</a></li>
    </ol>
</nav>
    
    <div class="row">
          <div class="col-12 col-sm-8 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">ÁREA ADMINISTRATIVA  DA GLIC</span>
              </div>
            </div>
          </div>
         
        </div>

@stop

@section('content')
 
@stop