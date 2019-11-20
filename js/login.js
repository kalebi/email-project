$(document).ready(function(){
    $("#bGoToRegister").click(function(){
        window.location.href="register.html";
    });
    $("input").attr("required",true);
    $("form#formId").submit(function(){
        preenchido = true;
        $("input").each(function(id,input){
            if($(input).val()==""){
                preenchido = false
            }
        });
        if(preenchido){
            $.ajax({
                type:"POST",
                dataType:"json",
                url:"../php/login.php",
                data:{
                    "email":$("#email").val(),
                    "senha":$("#senha").val()
                },
                success:function(retorno){
                    switch(retorno){
                        case 1:
                            window.location.href="inbox.html";
                            break;
                        case -1:
                            alert("Acesso não autorizado.");
                            break;
                        case -2:
                            alert("Não temos um usuario cadastrado. \nGostaria de ser o primeiro ?\nCadastre-se!");
                            break;
                        case -3:
                            alert("Login ou Senha Incorretos.")
                            break;
                    }
                },
                error:function(){
                    alert("Não foi possivel conectar com o servidor");
                }
            });
        }else{
            alert("Preencha login e Senha.");
        }
        return false;
    });
});