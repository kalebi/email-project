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
                    window.location.href="inbox.html";
                }
            },

            error: function(){
                alert("Sem conexão com o servidor!");
            }            
        });
    });

    $("#bGoToRegister").click(function(){
        window.location.href="register.html";
    });

    $("form").submit(function(){
        return false;
    });
});
