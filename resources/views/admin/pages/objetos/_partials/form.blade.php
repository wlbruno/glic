@include('admin.includes.alerts')

<div class="col-md-6">
  <div class="form-group">
    <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="nome"  placeholder="Digite o nome do objeto" value="{{ $objeto->nome ?? old('nome') }}">
  </div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <label for="nefisco">Nº E-fisco</label>
    <input type="text" class="form-control nefisco" name="nefisco" required placeholder="Digite o número do EFISCO"  value="{{ $objeto->nefisco ?? old('nefisco') }}">
  </div>
</div>
      
      
  

<div class="card-footer">
  <div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
  </div>
</div>

@section('js')
         <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
@stop
