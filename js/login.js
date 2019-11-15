$(document).ready(function(){
    $("#bEntrar").click(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "php/login.php",
            data: {
                login: $("#login").val(),
                senha: $("#senha").val(),
            },

            success: function(resposta){
                if (resposta === null){
                    alert("Login Incorreto!");
                }else{
                    alert("Entrando...");
                }
            },

            error: function(){
                alert("Sem conexão com o servidor!");
            }
           
             
        });
    });


    $("form").submit(function(){
        return false;
    });
});
