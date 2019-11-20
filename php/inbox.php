<?php

    $xml_string = file_get_contents("../xml/caixaentrada.xml");

    $xml_objeto = simplexml_load_string($xml_string);

    $retorno["emailEnviou"] = trim($xml_objeto->emailEnviou);
    $retorno["emailRecebeu"] = trim($xml_objeto->emailRecebeu);
    $retorno["assunto"] = trim($xml_objeto->assunto);
    $retorno["texto"] = trim($xml_objeto->texto);
    
    echo json_encode($retorno);
?>  