$(document).ready(function() {
 var botao = $('.bt');
 var dropDown = $('.ulprod');    

    botao.on('click', function(event){
        dropDown.stop(true,true).slideToggle();
        event.stopPropagation();
    });
});