$(document).ready(function(){
    $("#bEntrar").click()
            if ($.trim($("#createSenha").val() == $.trim($("#confirmSenha").val()))) {
                var ajax_nome = $("#createNome").val();
                var ajax_sobrenome = $("#createSobrenome").val();
                var ajax_email = $("#createEmail").val();
                var ajax_senha = $("#createSenha").val();
                var ajax_confirmsenha = $("#confirmSenha").val();

                $.ajax({

                    type: "POST",
                    url: "../php/register.php",
                    data: {
                        nome = ajax_nome,
                        sobrenome = ajax_sobrenome,
                        email = ajax_email,
                        senha = ajax_senha,
                        confimar = ajax_confirmsenha
                    },
                    success: function(retorno){
                        alert(retorno);
                    }
                });
            }
        }
    });

    $("#bGoToLogin").click(function () {
        window.location.href = "login.html";
    });
});