$(document).ready(function(){
    $("#bListar").click(function(){
        $.ajax({
            type: "POST",
            url: "../php/inbox.php",
            dataType: "json",
            success: function(retorno){

                var conteudo = "";

                conteudo += retorno.emailEnviou;
                conteudo += retorno.emailRecebeu;
                conteudo += retorno.assunto;
                conteudo += retorno.texto;
        
                $("#dLista").html(retorno);
            }
        });
    })
    
});    
