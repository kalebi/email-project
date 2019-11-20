$(document).ready(function () {
    $("#bListarE").click(function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../php/itensEnviados.php",
            data: {
                newPara: $("#newPara").val(),
                newCc: $("#newCc").val(),
                newAssunto: $("#newAssunto").val(),
                newTexto: $("#newTexto").val()
            },
            success: function (retorno) {
                alert("Email enviado com sucesso");
                window.location.href = "./emailSent.html";
            },
            error: function () {
               alert("Sem conexão com o servidor");
            }
        });

        return false;
        $("#bGoToLogin").click(function () {
            window.location.href = "./login.html";
        });
    });
}); 
