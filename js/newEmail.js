$(document).ready(function(){
    $("input").attr("required",true);

    $("formId#formId").submit(function(){
        preenchido = true;
        $("input").each(function(){ //percorrer todos os inputs para verificar se todos estão preenchidos 
            if($(input).val()==""){ 
                preenchido = false;
            }
        });
        if(preenchido){
            $.ajax({
                type: "POST",
                dataType: "json",
                url:"../php/newEmail.php",
                data: {
                    "new_para":$("#new_para").val(),
                    "new_cc":$("#new_cc").val(),
                    "new_assunto":$("#new_assunto").val(),
                    "new_texto":$("#new_texto").val()
                },
                success:function(retorno){
                    alert(retorno);
                },
                error:function(){
                    alert("Sem conexão ao servidor!");
                }
            });    
        }else{
            alert("Por favor preencha todos os dados!");
        }
        return false;
    });
});
