$(document).ready(function () {
    $("input").attr("required", true);

    $("formId#formId").submit(function () {
        preenchido = true;
        $("input").each(function () { //percorrer todos os inputs para verificar se todos estão preenchidos 
            if ($(input).val() == "") {
                preenchido = false;
            }
        });

        //verifica se a senha é igual ao confirmar senha
        if (preenchido) {
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