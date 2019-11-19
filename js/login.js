$(document).ready(function(){
    $("input").attr("required", true);
    $("form#formId").submit(function(){
        preenchido = true;
        $("input").each(function(id,input){
            if($(input).val==""){
                preenchido = false;
            }
        });
        if(preenchido){
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "../php/login.php",
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
            
        }else{
            alert("Preencha todos os campos!");
        }
    });
        
        $("#bGoToRegister").click(function(){
            window.location.href="register.html";
        });
        
        $("form").submit(function(){
            return false;
        });
});
