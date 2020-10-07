@include('admin.includes.alerts')
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>* Perfil:</label>
                <select class="form-control" required name="perfil">
                    <option value="" disabled="" selected="">Selecione o Perfil</option>
                        @foreach($perfis as $perfil)
                            <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
                        @endforeach
                </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>* Nome Completo:</label>
                <input type="text" name="name" class="form-control" required placeholder="Nome:">
            </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>* Nome do órgão:</label>
                <input type="text" name="nameorgao" class="form-control" required placeholder="Nome:">
            </div>
    </div>
    <div class="col-md-3">
        <label for="estado">* Estado: </label>
            <select class="form-control" name="estado" required  autofocus>
                <option value="" disabled="" selected="">Selecione o estado</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
    </div>
</div>
<div class="row">
     <div class="col-md-3">
        <div class="form-group">
            <label>* CPF:</label>
                <input type="text" name="cpf" class="form-control cpf" required placeholder="Digite o CPF:">
        </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
            <label>* Cargo:</label>
                <input type="text" name="cargo" class="form-control" required placeholder="Digite o cargo:">
        </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
            <label>* CNPJ:</label>
                <input type="text" name="cnpj" class="form-control cnpj" required placeholder="Digite o CNPJ do órgão:">
        </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
            <label>* Telefone:</label>
                <input type="text" name="telefone" class="form-control telefone" required placeholder="Digite o telefone:">
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>* E-mail:</label>
                <input type="email" name="email" class="form-control" required placeholder="exemplo@exemplo.com">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>* Confirma o E-mail:</label>
                <input type="cemail" name="cenail" class="form-control" required placeholder="exemplo@exemplo.com">
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>


@section('js')
  <script src="{{asset('js/jquery.mask.js')}}"></script>
  <script src="{{asset('js/mask.js')}}"></script>

  @endsection
