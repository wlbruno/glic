@extends('site.layout.master')

@section('title', 'GLIC')
@section('titulo', 'Contato ')

@section('content_header')


<div class="row">
      <div class="col-md-12">
      <div class="card card-default">
      <div class="card-header">
      <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active"><strong>PÁGINA DE CONTATO</strong></li>
        </ol>
      </div>
    
      </div>
        
      </div>
    </div>
<br>

@stop

@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
              <form action="" method="POST">
                 {{ method_field('PUT') }}
                 @csrf
                
                <div class="card-body">
                  
                  <div class="form-group">
                       <label >Nome:</label>
                    <input type="text" class="form-control" required name="name" placeholder="Nome Completo">
                  </div>
                  
                  <div class="form-group">
                    <label >E-mail:</label>
                    <input type="email" class="form-control" required name="email" placeholder="E-mail">
                  </div>

                  <div class="form-group">
                    <label >Telefone:</label>
                    <input type="text" class="form-control telefone" required name="email" min="0" max="11" placeholder="(00) 00000000">

                  </div>
                  
                  <div class="form-group">
                   <label for="cnovasenha">Mensagem</label>
                              <textarea class="form-control" required rows="3" placeholder="Digite sua mensagem"></textarea>  
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

@section('js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script>
    
    
    jQuery("input.telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });

    </script>

@stop
