@include('admin.includes.alerts')

@section('css')
   <link rel="stylesheet" href="{{asset('css/select/select2.min.css')}}">
   <link rel="stylesheet" href="{{asset('css/select/select2-bootstrap4.min.css')}}">
   
@endsection

<div class="row">
  <div class="col-md-6">
     <div class="form-group">
        <label>* Objeto</label>
          <select class="form-control select2" required name="objetos" data-select2-id="1" tabindex="-1" aria-hidden="true">
            
            @if($item ?? '' == true ?? '')
          
              <option value="{{ $item->objetos->id }} " selected="">{{ $item->objetos->nefisco }}</option>
            @foreach($objetos as $objeto)
          
              <option value="{{ $objeto->id }}">{{ $objeto->nefisco }}</option>
          
            @endforeach
            
            @else()
            <option value="" disabled="" selected="">Selecione o Objeto</option>
            @foreach($objetos as $objeto)
          
         
          
              <option value="{{ $objeto->id }}">{{ $objeto->nefisco }}</option>
            
            @endforeach
            
            @endif
          
          </select>
      </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label>* Fornecedores</label>
        <select class="form-control select2" required name="fornecedores" data-select2-id="17" tabindex="-1" aria-hidden="true">
         @if($item ?? '' == true ?? '')
            <option value="{{ $item->fornecedores->id }} " selected="">{{ $item->fornecedores->cnpj }}</option>
            @foreach($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}">{{ $fornecedor->cnpj }}</option>
          @endforeach
            @else()
          <option value="" disabled="" selected="">Selecione o Fornecedor</option>
          @foreach($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}">{{ $fornecedor->cnpj }}</option>
          @endforeach
          @endif
         </select>
      </div>

  </div>
</div>


<div class="row">
  
    <div class="col-md-6">
      <div class="form-group">
        <label for="marca">* Marca</label>
        <input type="text" class="form-control" name="marca" required placeholder="Digite o nome da marca" value="{{ $item->marca ?? old('marca') }}">
      </div>
    </div>

     <div class="col-md-6">
      <div class="form-group">
        <label for="quantidade">* Quantidade</label>
        <input type="text" class="form-control " name="quantidade" required placeholder="Digite a quantidade" value="{{ $item->quantidade ?? old('quantidade') }}">
      </div>
    </div>


  </div>


<div class="row">
  
    <div class="col-md-6">
      <div class="form-group">
        <label for="medida">* Unidade de Medida</label>
        <input type="text" class="form-control" name="medida" required placeholder="EX: AMPOLA" value="{{ $item->medida ?? old('medida') }}">
      </div>
    </div>

     <div class="col-md-6">
      <div class="form-group">
        <label for="vunitario">* Valor unitário</label>
        <input type="text" class="form-control " name="vunitario" required placeholder="Digite o valor " value="{{ $item->vunitario ?? old('vunitario') }}">
      </div>
    </div>


  </div>



<div class="card-footer">
  <div class="form-group">
    <button type="submit" class="btn btn-success formButton" id="send">Salvar</button>
    
    @if(isset($ata->lotes) == true)
      <a href="{{ route('lotes.create', $ata->id) }}" class="btn btn-secondary">Voltar</a>
    @endif
  
  </div>
</div>


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{asset('js/select/select2.full.min.js')}}"></script>
<script src="{{asset('js/jquery.mask.js')}}"></script>
<script src="{{asset('js/mask.js')}}"></script>
      

<script type="text/javascript">

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })

</script> 



<script>

var formID = document.getElementById("formID");
var send = $("#send");

$(formID).submit(function(event){
  if (formID.checkValidity()) {
    send.attr('disabled', 'disabled');
  }
});

</script>


@stop
