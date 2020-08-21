@include('admin.includes.alerts')

<div class="col-md-6">
  <div class="form-group">
    <label for="fornecedor">* Nome: </label>
      <input type="text" class="form-control" name="fornecedor"  placeholder="Digite o nome do fornecedor" value="{{ $fornecedor->fornecedor ?? old('nome') }}">
  </div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <label for="cnpj">* Nº CNPJ </label>
    <input type="text" class="form-control cnpj" name="cnpj" required placeholder="Digite o número do CNPJ"  value="{{ $fornecedor->cnpj ?? old('cnpj') }}">
  </div>
</div>
      
      
  

<div class="card-footer">
  <div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
    <a href="{{ route('fornecedores.index') }}" class="btn btn-dark">Voltar</a>
  </div>
</div>

@section('js')
         <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
@stop
