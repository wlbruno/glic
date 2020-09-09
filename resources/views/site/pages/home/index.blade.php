@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', 'BEM VINDO')

@section('content_header')

<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
 </ol>


@stop

@section('content')


<div class="row">

          <div class="col-lg-3 col-6">
          
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$atasmedicamentos}}</h3>

                <p>Medicamentos</p>
              </div>
              
              @if($atasmedicamentos == '0') 
                  <center class="small-box-footer">Sem atas vigentes</center>
                @else()
                  <a href="{{ route('atas.medicamentos') }}" class="small-box-footer">Visualizar Atas  <i class="fa fa-arrow-circle-right"></i></a>
                @endif
            </div>
          </div>

           <div class="col-lg-3 col-6">
          
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$atasprodutos}}</h3>

                <p>Produtos Médicos</p>
              </div>
              
               @if($atasprodutos == '0') 
                    <center class="small-box-footer" >Sem atas vigentes</center>
                  @else()
                    <a href="{{ route('atas.produtos') }}" class="small-box-footer" >Visualizar Atas  <i class="fa fa-arrow-circle-right"></i></a>
                  @endif
            </div>
          </div>

           <div class="col-lg-3 col-6">
          
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$atasaquisicoes}}</h3>

                <p>Aquisições em Geral</p>
              </div>
              
                  @if($atasaquisicoes == '0') 
                      <center class="small-box-footer" >Sem atas vigentes</center>
                    @else()
                      <a href="{{ route('atas.aquisicao') }}" class="small-box-footer" >Visualizar Atas  <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
            </div>
          </div>

           <div class="col-lg-3 col-6">
          
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$atasservicos}}</h3>

                <p>Serviços em Geral</p>
              </div>
              
                    @if($atasservicos == '0') 
                      <center class="small-box-footer" >Sem atas vigentes</center>
                    @else()
                      <a href="{{ route('atas.servicos') }}" class="small-box-footer" >Visualizar Atas  <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
            </div>
          </div>
    
        </div>



<div class="row">
  <div class="col-lg-3">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pesquisa avançada</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('atas.search.index') }}" method="POST" class="form form-inline">
            @csrf
            
                <div class="card-body">
                  <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Nº Ata ou Nº Processo </label> -->
                     <input type="text"  style="width: 228px" name="filter" placeholder="Nº Ata ou Nº Processo" required  class="form-control nata" value="{{ $filters['filter'] ?? ''  }}"></div>
            
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>  PESQUISAR</button>
                </div>
              </form>
            </div>
  </div>

    <div class="col-lg-3">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Validar Key</h3>
              </div>
              <form action="{{ route('search.key') }}" method="POST" class="form form-inline">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    
                    <input type="text" class="form-control" style="width: 228px" name="key" required placeholder="Digite a chave de validação">
                  </div>
                
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>  VALIDAR</button>
                </div>
              </form>
            </div>
  </div>
</div>
@stop

@section('js')
         <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
@stop
