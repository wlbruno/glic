<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>SESPE</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
         <img src="img/sespe.png">
    </head>
    <body>
        <p id="p2">
            <h3><center>CERTIDÃO DE AUTORIZAÇÃO DE ADESÃO “CARONA”</center></h3>
        </p><br><br>
        <p>
            <strong>REQUISITANTE: </strong>{{auth()->user()->Solicitante->orgao}}
        </p>
        <p>
            <strong>CNPJ: </strong>{{auth()->user()->Solicitante->cnpj}}
        </p>
        <p>
            <strong>Data da Requisição: </strong>{{date('d/m/Y')}}
        </p>
        <p>
            <strong>Processo nº. </strong>{{$caronas->atas->nprocesso}}.{{$caronas->atas->comissao}}.PE.{{$caronas->atas->npregao}}.SES
        </p>
        <p>  
            <strong>Ata nº: </strong>{{$caronas->atas->nata}}
        </p>
        <p>
            <strong>Pregão nº: </strong>{{$caronas->atas->npregao}}
        </p>
        <p>
            <strong>Departamento: </strong>{{$caronas->atas->departamento}}
        </p>
        <p>
            <strong>Descrição: </strong>{{$caronas->atas->descricao}}   
        </p>
        <p>
            <strong>Vigência da ARP: </strong>{{$caronas->atas->vigencia}}
        </p>
        <p>
            <strong>Tipo: </strong>{{$caronas->atas->tipo}}<br><br>
        <p>
            Certificamos, nos termos do<strong>art. 22, caput, e seu § 1º, do Decreto Estadual nº. 42.530/2015</strong>, atualizado, que a presente Adesão “Carona” está devidamente <strong>AUTORIZADA</strong> perante o presente Órgão Gerenciador,
            Secretaria de Saúde do Estado de Pernambuco.
        </p>
        <p>
            1. O órgão não participante supra deverá efetivar a aquisição ou
            contratação em até 90 (noventa) dias, observado prazo de vigência da Ata
            (vide <strong>art. 22, § 4º, do Decreto Estadual nº. 42.530/2015</strong>,
            atualizado).
        </p>
        <p>
            2. Alertamos que os órgãos e entidades não participantes devem, antes de
            solicitar adesão à Ata de Registro de Preços, realizar pesquisa prévia de
            mercado a fim de comprovar a vantajosidade dos preços registrados (vide    <strong>art. 22, § 3º, do Decreto Estadual nº. 42.530/2015</strong>,
            atualizado).
        </p>
        <p>
            Certidão emitida gratuitamente com base na Portaria SES/PE nº. 001/2019, de
            01/07/2019, publicada no Diário Oficial do Estado de Pernambuco, edição de  02/07/2019.
        </p>
        <p id="p2">
            <strong>Código de Autenticação: </strong>
        </p>
        <p id="p2">
            <strong>Emitida em: </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Válida até:   </strong>
        </p><br>

        @if($caronas->atas->tipo == 'LOTE')
        <div class="row">
                <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header">
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                            <div class="box-body" style="">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <table border="1" class="table table-ordered table-hover">
                                            <thead>
                                                <tr id="tt">
                                                    <th>{{$caronas->Atas->lotes[0]->descricao}}</th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr id="tt">
                                                    <th>ITENS</th>
                                                    <th>N° E-FISCO</th>
                                                    <th>Empresa</th>
                                                    <th>CNPJ</th>
                                                    <th>Marca</th>
                                                    <th>Unidade de medida</th>
                                                    <th>Valor unitário</th>
                                                    <th>Valor total</th>
                                                    <th>Quantidade Solicitada</th>
                                                </tr>
                                            </thead>
                                                   <tbody>
                                                @foreach($caronas->Itens as $item)
                                                    <tr>
                                                        <td>{{$item->objetos->nome}}</td>
                                                        <td>{{$item->objetos->nefisco}}</td>
                                                        <td>{{$item->empresas->fornecedor}}</td>
                                                        <td>{{$item->empresas->cnpj}}</td>
                                                        <td>{{$item->marca}}</td>
                                                        <td>{{$item->medida}}</td>
                                                        <td>{{$item->vunitario}}</td>
                                                        <td>{{$item->vtotal}}</td>
                                                        @foreach($caronas->itens as $itemcarona)
                                                            @if($itemcarona->id == $item->id)
                                                              <td>{{$caronas->Carona_itens->getQTD($itemcarona->id)->quantidade}}</td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else()

            <div class="row">
            	<div class="col-md-12">
              		<div class="box box-default">
                		<div class="box-header">
                    		<div class="box-tools pull-right">
                        		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                             	</button>
                        	</div>
                    	</div>
           					<div class="box-body" style="">
                				<div class="card card-primary">
                    				<div class="card-header">
                        				<table border="1" class="table table-ordered table-hover">
                            				<thead>
                                                <tr id="tt">
                                                    <th>ITENS</th>
                                                    <th>N° E-FISCO</th>
                                                    <th>Empresa</th>
                                                    <th>CNPJ</th>
                                                    <th>Marca</th>
                                                    <th>Unidade de medida</th>
                                                    <th>Valor unitário</th>
                                                    <th>Valor total</th>
                                                    <th>Quantidade Solicitada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($caronas->Itens as $item)
                                                    <tr>
                                                        <td>{{$item->objetos->nome}}</td>
                                                        <td>{{$item->objetos->nefisco}}</td>
                                                        <td>{{$item->fornecedores->fornecedor}}</td>
                                                        <td>{{$item->fornecedores->cnpj}}</td>
                                                        <td>{{$item->marca}}</td>
                                                        <td>{{$item->medida}}</td>
                                                        <td>{{$item->vunitario}}</td>
                                                        <td>{{$item->vtotal}}</td>
                                                        @foreach($caronas->itens as $itemcarona)
                                                            @if($itemcarona->id == $item->id)
                                                              <td>{{$caronas->Carona_itens->getQTD($itemcarona->id)->quantidade}}</td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
        				                </table>
        				            </div>
        				        </div>
        				    </div>
        				</div>
        		    </div>
        		</div>
                @endif
        		<br>
        			<div class="footer">
		              Acompanhe as sessões públicas dos Pregões, Dispensas e Inexigibilidades de Licitação da SES/PE, selecionando as opções Negociação > Licitações ou Compras Diretas > Lista. O Edital e outros anexos estão disponíveis para download no PE-Integrado (www.peintegrado.pe.gov.br) e também no endereço www.licitacoes.pe.gov.br
		            </div>
		        </body>   
        	</html>
