$(document).ready(function () {

    $("input").attr("required", true);

    $("form#formId").submit(function () {
            preenchido = true;
            $("input").each(function (id, input) {
                if ($(input).val() == "") {
                    preenchido = false;
                }
            });
            if (preenchido) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "../php/register.php",
                    data: {
                        "createNome": $("#createNome").val(),
                        "createSobrenome": $("#createSobrenome").val(),
                        "createEmail": $("#createEmail").val(),
                        "createSenha": $("#createSenha").val()

                    },
                    success: function (retorno) {
                        switch (retorno) {
                            case 1:
                                alert("Usuário cadastrado com sucesso!!");
                                window.location.href = "login.html";
                                break;
                            case -1:
                                alert("Desculpe, usuário já cadastrado no sistema :(");
                                break;
                            case -2:
                                alert("SEM PERMISSAO!");
                                break;
                        }
                    },
                    error: function () {
                        alert("Erro ao conectar com o servidor.");
                    }
                });
        }else{
            alert("Por favor preencha todos os campos!");
        }
        return false;
    }); $("#bGoToLogin").click(function () {
    window.location.href = "login.html";
});
});