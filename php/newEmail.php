<?php
    if($_POST){
        extract($_POST);
        if(isset($newPara,$newCc,$newAssunto,$newTexto)){
            $diretorio = dir("../xml/novoEmail");
            $cont = 0;
            while(($dir = $diretorio->read()) !== false){
                $cont++;
                if($dir != "." && $dir != ".."){
                    $str_xml = file_get_contents("../xml/novoEmail/".$dir."/enviado.xml");
                    $xml = simplexml_load_string($str_xml);
            
                    $array_id_atual = explode("_",$dir);
                    $id_atual = $array_id_atual[1];
                    if(!isset($maior)){
                        $maior = $id_atual; 
                    }else if($maior < $id_atual){
                        $maior = $id_atual;
                    }
                }
            }
            if($cont == 2){
                $maior = 0;
            }
                $url = "../xml/novoEmail/enviado_".($maior+1);
                if(!file_exists($url)){
                    mkdir($url);

                    $xml = new DOMDocument("1.0");
                    
                    $xml_enviado = $xml->createElement("enviado");

                    $xml_para = $xml->createElement("para",$newPara);
                    $xml_cc = $xml->createElement("cc",$newCc);
                    $xml_assunto = $xml->createElement("assunto",$newAssunto);
                    $xml_texto = $xml->createElement("texto",$newTexto);
 
                    $xml_enviado->appendChild($xml_para);
                    $xml_enviado->appendChild($xml_cc);
                    $xml_enviado->appendChild($xml_assunto);
                    $xml_enviado->appendChild($xml_texto);

                    $xml->appendChild($xml_enviado);
                    $xml->save($url."/enviado.xml");
           
                echo json_encode(true);               
        }
      
    }
}
?>