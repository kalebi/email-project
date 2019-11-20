<?php

    $xml_string = file_get_contents("../xml/caixaentrada.xml");
    $xml_objeto = simplexml_load_string($xml_string);

    $retorno = "";        
foreach($xml_objeto->caixaEntrada as $dados){
   $linha = "<p>";
   $linha .= "De: ". $dados->emailEnviou;
   $linha .= "   Para: ". $dados->emailRecebeu;
   $linha .= "   Assunto: ". $dados->assunto;
   $linha .= "   Mensagem: ". $dados->texto;
   $linha .=  "</p>";
   $retorno .= $linha;
}
echo json_encode($retorno);

?>  