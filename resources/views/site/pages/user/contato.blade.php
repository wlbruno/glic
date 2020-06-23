@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', 'Atas Solicitadas')

@section('content_header')

<ol class="breadcrumb float-sm-right">
     <li class="breadcrumb-item " ><a href="/">Home</a></li>
   <li class="breadcrumb-item active" ><a href="/">Contato</a></li>
</ol>

@stop

@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Atualizar Perfil</h3>
              </div>
              <form action="" method="POST">
                 {{ method_field('PUT') }}
                 @csrf
                
                <div class="card-body">
                  
                  <div class="form-group">
                       <label >Nome:</label>
                    <input type="text" class="form-control" name="name" placeholder="Nome Completo">
                  </div>
                  
                  <div class="form-group">
                    <label >E-mail:</label>
                    <input type="email" class="form-control" name="email" placeholder="E-mail">
                  </div>

                  <div class="form-group">
                    <label >Telefone:</label>
                    <input type="number" class="form-control" name="email" placeholder="Telefone">
                  </div>

                  <div class="form-group">
                   <label for="cnovasenha">Mensagem</label>
                   <div class="col-md-12">
                              <textarea class="form-control" rows="3" placeholder="Digite sua mensagem"></textarea>
                            </div>
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
