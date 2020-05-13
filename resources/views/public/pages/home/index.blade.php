@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('home.index') }}">Home</a></li>
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
              <div class="icon">
              <i class="fas fa-syringe"></i>
              </div>
              @if($atasmedicamentos == '0') 
                  <center class="small-box-footer">Sem atas vigentes</center>
                @else()
                  <a href="/ata/medicamentos" class="small-box-footer">Visualizar Atas  <i class="fa fa-arrow-circle-right"></i></a>
                @endif
            </div>
          </div>

           <div class="col-lg-3 col-6">
          
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$atasprodutos}}</h3>

                <p>Produtos Médicos</p>
              </div>
              <div class="icon">
                <i class="fas fa-capsules"></i>
              </div>
               @if($atasprodutos == '0') 
                    <center class="small-box-footer" >Sem atas vigentes</center>
                  @else()
                    <a href="/ata/produtos" class="small-box-footer" >Visualizar Atas  <i class="fa fa-arrow-circle-right"></i></a>
                  @endif
            </div>
          </div>

           <div class="col-lg-3 col-6">
          
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$atasaquisicoes}}</h3>

                <p>Aquisições em Geral</p>
              </div>
              <div class="icon">
                <i class="fas fa-capsules"></i>
              </div>
                  @if($atasaquisicoes == '0') 
                      <center class="small-box-footer" >Sem atas vigentes</center>
                    @else()
                      <a href="/ata/aquisicao" class="small-box-footer" >Visualizar Atas  <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
            </div>
          </div>

           <div class="col-lg-3 col-6">
          
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$atasservicos}}</h3>

                <p>Serviços em Geral</p>
              </div>
              <div class="icon">
             <i class="fas fa-capsules"></i>
              </div>
                    @if($atasservicos == '0') 
                      <center class="small-box-footer" >Sem atas vigentes</center>
                    @else()
                      <a href="/ata/servicos" class="small-box-footer" >Visualizar Atas  <i class="fa fa-arrow-circle-right"></i></a>
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
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nº PREGÃO:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="DIGITE O NÚMERO DO PREGÃO">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Nº ATA:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="DIGITE O NÚMERO DA ATA">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nº PROCESSO:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="DIGITE O NUMERO DO PROCESSO">
                  </div>
                 
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
                <h3 class="card-title">VALIDAR KEY</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="DIGITE O NÚMERO DA KEY">
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