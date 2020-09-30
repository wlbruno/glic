@include('admin.includes.alerts')
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="departamento">* Departamento</label>
        <select class="form-control" required name="departamento" value="{{ $ata->departamento ?? old('departamento') }}">
          @if($ata ?? '' == true ?? '')
          <option value="{{ $ata->departamento ?? old('departamento') }}" selected=""> {{ $ata->departamento ?? old('departamento') }}</option>
          @else()
          <option value="" disabled="" selected="">Selecione o departamento</option>
          @endif
          <option value="MEDICAMENTOS">MEDICAMENTOS</option>
          <option value="PRODUTOS MÉDICOS">PRODUTOS MÉDICOS</option>
          <option value="AQUISIÇÕES EM GERAL">AQUISIÇÕES EM GERAL</option>
          <option value="SERVIÇOS EM GERAL">SERVIÇOS EM GERAL</option>
        </select>
      </div>
    </div>



    <div class="col-md-2">
      <div class="form-group">
        <label for="nata">* Nº Ata</label>
        <input type="text" class="form-control nata" name="nata" required placeholder="Digite o número da ata" value="{{ $ata->nata ?? old('nata') }}">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="nprocesso">* Nº Processo</label>
        <input type="text" class="form-control nata" name="nprocesso" placeholder="Digite o número do processo" required  value="{{ $ata->nprocesso ?? old('nprocesso') }}">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="npregao">* Nº Pregão</label>
          <input type="text" class="form-control nata" name="npregao" required placeholder="Digite o número do processo"  value="{{ $ata->npregao ?? old('npregao') }}">
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-2">
      <div class="form-group">
        <label for="comissao">* Comissão</label>
          <select class="form-control" required name="comissao"  value="{{ $ata->comissao ?? old('comissao') }}">
           
           @if($ata ?? '' == true ?? '')
            <option value="{{ $ata->comissao ?? old('comissao') }} " selected="">{{ $ata->comissao ?? old('comissao') }}</option>
            @else()
            <option value="" disabled="" selected="">Selecione a Comissão</option>
            @endif
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

    <div class="col-md-2">
      <div class="form-group">
        <label for="tipo">* TIPO: </label>
          <select class="form-control" name="tipo" required  value="{{ $ata->tipo ?? old('tipo') }}">
          @if($ata ?? '' == true ?? '')
          <option value="{{ $ata->tipo ?? old('tipo') }}"  selected="">{{ $ata->tipo ?? old('tipo') }}</option>
          @else()
            <option value="" disabled="" selected="">Selecione o tipo</option>
            @endif
            <option value="LOTE">LOTE</option>
            <option value="ITEM">ITEM</option>
          </select>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="orgao">* ÓRGÃO:</label>
            <select class="form-control" name="orgao" required="true"  value="{{ $ata->orgao ?? old('orgao') }}">
             
              @if($ata ?? '' == true ?? '')
            <option value="{{ $ata->orgao ?? old('orgao') }}"  selected="">{{ $ata->orgao ?? old('orgao') }}</option>
            @else()
            <option value="" disabled="" selected="">Adicionar órgãos?</option>
            @endif
              <option value="SIM">SIM</option>
              <option value="NÃO">NÃO</option>
            </select>
          </div>
        </div>
    
    <div class="col-md-
    3">
      <div class="form-group">
        <label for="vigencia">* Vigência</label>
          <select class="form-control" name="vigencia" required  value="{{ $ata->vigencia ?? old('vigencia') }}">
            <option value="" disabled="" selected="">Selecione a vigência</option>

            @if($ata ?? '' == true ?? '')
            <option value="{{ $ata->vigencia ?? old('vigencia') }}"  selected="">{{ $ata->vigencia ?? old('vigencia') }}</option>
            @else()
            <option value="" disabled="" selected="">Selecione a vigência</option>
            @endif

            <option value="01">1 mês</option>
            <option value="02">2 meses</option>
            <option value="03">3 meses</option>
            <option value="04">4 meses</option>
            <option value="05">5 meses</option>
            <option value="06">6 meses</option>
            <option value="07">7 meses</option>
            <option value="08">8 meses</option>
            <option value="09">9 meses</option>
            <option value="10">10 meses</option>
            <option value="11">11 meses</option>
            <option value="12">12 meses</option>
          </select>
        </div>
      </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="data_assinatura">* Data da Assinatura</label>
          <div class="input-group">
            <input type="date" class="form-control"  name="data_assinatura" required  value="{{ $ata->data_assinatura ?? old('data_assinatura') }}">
          </div>
        </div>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-12">          
        <div class="form-group">
          <label for="descricao">* Descrição</label>
            <textarea class="form-control" rows="3" name="descricao" required placeholder="Descrição ..."  >{{ $ata->descricao  ?? old('descricao')}}</textarea>
          </div>
        </div>
      </div>

      @if(!isset($ata))
      <div class="row">
        <div class="col-md-6">
          <label for="arquivo">* Arquivo</label>
            <input type="file" class="form-control"  name="arquivo" required  value="{{ $ata->arquivo ?? old('arquivo') }}">
        </div>
      </div>
      @endif
  
  <div class="card-footer">
    <div class="form-group">
      <button type="submit" class="btn btn-dark formButton" id="send">Salvar</button>

    </div>
  </div>

@section('js')
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/mask.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
