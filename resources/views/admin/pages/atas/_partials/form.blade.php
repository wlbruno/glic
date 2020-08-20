@include('admin.includes.alerts')
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="departamento">* Departamento</label>
        <select class="form-control" required name="departamento" value="{{ $ata->departamento ?? old('departamento') }}">
          <option value="" disabled="" selected="">Selecione o departamento</option>
          <option value="MEDICAMENTOS">MEDICAMENTOS</option>
          <option value="PRODUTOS MEDICOS">PRODUTOS MÉDICOS</option>
          <option value="AQUISIÇÕES EM GERAL">AQUISIÇÕES EM GERAL</option>
          <option value="SERVIÇOS EM GERAL">SERVIÇOS EM GERAL</option>
        </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="nata">* Nº Ata</label>
      <input type="text" class="form-control nata" name="nata" required placeholder="Digite o número da ata" value="{{ $ata->nata ?? old('nata') }}">
      </div>
    </div>
  </div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="comissao">* Comissão</label>
        <select class="form-control" required name="comissao"  value="{{ $ata->comissao ?? old('comissao') }}">
          <option value="" disabled="" selected="">Selecione a Comissão</option>
          <option value="CPLC I">CPLC I</option>
          <option value="CPLC II">CPLC II</option>
          <option value="CPLC III">CPLC III</option>
          <option value="CPLC IV">CPLC IV</option>
          <option value="CPLC V">CPLC V</option>
          <option value="CPLC VI">CPLC VI</option>
          <option value="CPLC VII">CPLC VII</option>
          <option value="CPLC VIII">CPLC VIII</option>          
        </select>
      </div>
    </div>

     <div class="col-md-6">
      <div class="form-group">
        <label for="nprocesso">* Nº Processo</label>
        <input type="text" class="form-control nata" name="nprocesso" placeholder="Digite o número do processo" required  value="{{ $ata->nprocesso ?? old('nprocesso') }}">
      </div>
    </div>
  </div>  

<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <label for="vigencia">* Vigência</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
          </div>
            <input type="date" class="form-control"  name="vigencia" required  value="{{ $ata->vigencia ?? old('vigencia') }}">
          </div>
        </div>
      </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="tipo">* TIPO: </label>
              <select class="form-control" name="tipo" required  value="{{ $ata->tipo ?? old('tipo') }}">
                <option value="" disabled="" selected="">Selecione o tipo</option>
                <option value="LOTE">LOTE</option>
                <option value="ITEM">ITEM</option>
              </select>
            </div>
          </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="npregao">* Nº Pregão</label>
              <input type="text" class="form-control nata" name="npregao" required placeholder="Digite o número do processo"  value="{{ $ata->npregao ?? old('npregao') }}">
          </div>
        </div>
      
      
          <div class="col-md-3">
            <div class="form-group">
              <label for="orgao">* ÓRGÃO:</label>
                <select class="form-control" name="orgao" required="true"  value="{{ $ata->orgao ?? old('orgao') }}">
                  <option value="" disabled="" selected="">Adicionar órgãos?</option>
                  <option value="SIM">SIM</option>
                  <option value="NAO">NÃO</option>
                </select>
              </div>
            </div>
          </div>
  
        <div class="row">
          <div class="col-md-12">          
            <div class="form-group">
              <label for="descricao">* Descrição</label>
                <textarea class="form-control" rows="3" name="descricao" required placeholder="Descrição ..."  value="{{ $ata->descricao ?? old('descricao') }}"></textarea>
           </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="arquivo">* Arquivo</label>
            <input type="file" class="form-control" required name="arquivo"  value="{{ $ata->arquivo ?? old('arquivo') }}">
        </div>
      </div>

<div class="card-footer">
  <div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
  </div>
</div>

@section('js')
         <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
@stop
