@include('admin.includes.alerts')



<div class="row">

  <div class="col-md-6">
    <div class="form-group">
      <label for="objetos">Objetos</label>
        <select class="form-control" required name="objetos">
          <option value="" disabled="" selected="">Selecione o objeto</option>
          <option value="MEDICAMENTOS">MEDICAMENTOS</option>
          <option value="PRODUTOS MEDICOS">PRODUTOS MÉDICOS</option>
          <option value="AQUISIÇÕES EM GERAL">AQUISIÇÕES EM GERAL</option>
          <option value="SERVIÇOS EM GERAL">SERVIÇOS EM GERAL</option>
        </select>
      </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
      <label for="fornecedores">Fornecedores</label>
        <select class="form-control" required name="fornecedores">
          <option value="" disabled="" selected="">Selecione o fornecedor</option>
          <option value="MEDICAMENTOS">MEDICAMENTOS</option>
          <option value="PRODUTOS MEDICOS">PRODUTOS MÉDICOS</option>
          <option value="AQUISIÇÕES EM GERAL">AQUISIÇÕES EM GERAL</option>
          <option value="SERVIÇOS EM GERAL">SERVIÇOS EM GERAL</option>
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
        <label for="medica">Unidade de Medida</label>
        <input type="text" class="form-control" name="medica" required placeholder="EX: AMPOLA" >
      </div>
    </div>

     <div class="col-md-6">
      <div class="form-group">
        <label for="vunitario">Valor unitário</label>
        <input type="text" class="form-control" name="vunitario" required placeholder="Digite o valor unitário">
      </div>
    </div>


  </div>



<div class="card-footer">
  <div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>
</div>