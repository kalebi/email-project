<?php

    $xml_string = file_get_contents("../xml/enviado.xml");
    $xml_objeto = simplexml_load_string($xml_string);

    $retorno = "";        
foreach($xml_objeto->enviado as $dados){
   $linha = "<p>";
   $linha .= "De: ". $dados->para;
   $linha .= "  Para: ". $dados->cc;
   $linha .= "  Assunto: ". $dados->assunto;
   $linha .= "  Mensagem: ". $dados->texto;
   $linha .=  "</p>";
   $retorno .= $linha;
}
echo json_encode($retorno);

?> 