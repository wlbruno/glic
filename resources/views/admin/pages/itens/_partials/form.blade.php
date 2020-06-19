@include('admin.includes.alerts')

@section('css')
   <link rel="stylesheet" href="{{asset('css/select/select2.min.css')}}">
   <link rel="stylesheet" href="{{asset('css/select/select2-bootstrap4.min.css')}}">
  
@endsection

<div class="row">
  <div class="col-md-6">
     <div class="form-group">
        <label>Objeto</label>
          <select class="form-control select2 select2-hidden-accessible" name="objetos" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            <option value="" disabled="" selected="">Selecione o Objeto</option>
            @foreach($objetos as $objeto)
              <option value="{{ $objeto->id }}">{{ $objeto->nome }}</option>
            @endforeach
          </select>
      </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label>Fornecedores</label>
        <select class="form-control select2 select2-hidden-accessible" name="fornecedores" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
          <option value="" disabled="" selected="">Selecione o Fornecedor</option>
          @foreach($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}">{{ $fornecedor->fornecedor }}</option>
          @endforeach
         </select>
      </div>

  </div>
</div>


<div class="row">
  
    <div class="col-md-6">
      <div class="form-group">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" name="marca" required placeholder="Digite o nome da marca" >
      </div>
    </div>

     <div class="col-md-6">
      <div class="form-group">
        <label for="quantidade">Quantidadde</label>
        <input type="text" class="form-control" name="quantidade" required placeholder="Digite a quantidade">
      </div>
    </div>


  </div>


<div class="row">
  
    <div class="col-md-6">
      <div class="form-group">
        <label for="medida">Unidade de Medida</label>
        <input type="text" class="form-control" name="medida" required placeholder="EX: AMPOLA" >
      </div>
    </div>

     <div class="col-md-6">
      <div class="form-group">
        <label for="vunitario">Valor unitário</label>
        <input type="text" class="form-control dinheiro" name="vunitario" required placeholder="Digite o valor unitário">
      </div>
    </div>


  </div>



<div class="card-footer">
  <div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>
</div>


@section('js')
         <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
      <script src="{{asset('js/select/select2.full.min.js')}}"></script>

<script type="text/javascript">

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })

</script>
@stop
