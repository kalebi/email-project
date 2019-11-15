<?php
    $xml_string = file_get_contents("../xml/usuarios.xml");
    $xml = simplexml_load_string($xml_string);

    $login = $xml->login;
    foreach($login as $usuario){    
        //echo $usuario->usuario;
        //echo $usuario->senha;
        if ($usuario->usuario == $_POST['login'] && $usuario->senha == $_POST['senha']){
            $resposta = array (
                "usuario"=>$_POST["login"]
            );
            break;
        }else{
            $resposta = null;
            
        }
    }
    echo json_encode($resposta);
?>