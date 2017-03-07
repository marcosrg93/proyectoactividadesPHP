/* global $*/
$(function(){
    var container = $("#wrapper");
    
    function recargaPagina(){
        $('.pantallaCarga').remove();
        container.show();
    }
    
    $(document).ajaxStart(function(){
        container.hide();
        container.before('<div class="pantallaCarga"></div>');
        $('.pantallaCarga').css('height',$(window).height());
        setTimeout(recargaPagina, 2500);
    });
    
    /*Función para la pantalla de carga en el paso del login a las actividades*/
    $(document).ready(function(){
        container.hide();
        container.before('<div class="pantallaCarga"></div>');
        $('.pantallaCarga').css('height',$(window).height());
        setTimeout(recargaPagina, 2500);
    });
    
    
}());