$(document).ready(function($){
    $('.fone').mask('(00)0000-0000', {reverse: true});
    $('.nata').mask('0000/0000', {reverse: true});
    $('.nefisco').mask('000000-0', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cep').mask('00000-000', {reverse: true});
    $('.quantidade').mask('000.000', {reverse: true});
    $('.rg').mask('0.000.000');
      $('.dinheiro').mask("000.000.00", {reverse: true});
});

 
jQuery("input.telefone")
.mask("(99) 9999-99999")
.focusout(function (event) {  
    var target, phone, element;  
    target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
    phone = target.value.replace(/\D/g, '');
    element = $(target);  
    element.unmask();  
    if(phone.length > 10) {  
        element.mask("(99) 99999-9999");  
    } else {  
        element.mask("(99) 9999-99999");  
    }  
});