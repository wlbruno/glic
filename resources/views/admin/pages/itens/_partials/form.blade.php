@include('admin.includes.alerts')



<div class="row">

  <div class="col-md-6">
    <div class="form-group">
      <label for="objetos">Objetos</label>
        <select class="form-control" required name="objetos">
          <option value="" disabled="" selected="">Selecione o Objeto</option>
                          @foreach($objetos as $objeto)
                          <option value="{{$objeto->id}}">{{$objeto->nome}}</option>
                          @endforeach
        </select>
      </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
      <label for="fornecedores">Fornecedores</label>
        <select class="form-control" required name="fornecedores">
            <option value="" disabled="" selected="">Selecione o fornecedor</option>
                              @foreach($fornecedores as $fornecedor)
                              <option value="{{$fornecedor->id}}">{{$fornecedor->fornecedor}}</option>
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
@stop
