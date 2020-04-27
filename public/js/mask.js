$(document).ready(function($){
    $('.fone').mask('00 0000-0000', {reverse: true});
    $('.nata').mask('000/0000', {reverse: true});
    $('.nefisco').mask('000000-0', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cep').mask('00000-000', {reverse: true});
    $('.rg').mask('0.000.000');
    $('.dinheiro').mask("###0.0000", {reverse: true});
    
});