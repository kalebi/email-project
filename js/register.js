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
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "../php/register.php",
                    data: {
                        "createNome": $("#createNome").val(),
                        "createSobrenome": $("#createSobrenome").val(),
                        "createEmail": $("#createEmail").val(),
                        "createSenha": $("#createSenha").val(),
                        "confirmSenha": $("#confirmSenha").val()
                    },
                    success: function (retorno) {
                        switch (retorno) {
                            case 1:
                                alert("Usuário cadastrado com sucesso!");
                                window.location.href = "login.html";
                                break;

                            case 2:
                                alert("Esse usuário já está cadastrado!");
                                break;

                            case 3:
                                alert("Sem permissão");
                                break;
                        }
                    },

                    error: function () {
                        alert("Sem conexão ao servidor!");
                    }
                });
            } else {
                alert("Por favor preencha todos os campos");
            }
            return false;
        }
    });

    $("#bGoToLogin").click(function () {
        window.location.href = "login.html";
    });
});