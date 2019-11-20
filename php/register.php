<?php
    if($_POST){
        extract($_POST);
        if(isset($createNome,$createSobrenome,$createEmail,$createSenha)){
            $diretorio = dir("../xml/users");
            $exist = false;
            $cont = 0;
            while(($dir = $diretorio->read()) !== false){
                $cont++;
                if($dir != "." && $dir != ".."){
                    //Pesquisa XML
                    $str_xml = file_get_contents("../xml/users/".$dir."/dados.xml");
                    $xml = simplexml_load_string($str_xml);
                    if($xml->email == $createEmail){
                        $exist = true;
                    }
                    //Achar proximo ID
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
            if($exist){
                echo json_encode(-1);
            }else{
                $url = "../xml/users/user_".($maior+1);
                if(!file_exists($url)){
                    mkdir($url);
                    mkdir($url."/pastas");
                    $pastas = array("Favoritos","CaixaEntrada","LixoEletronico","Rascunho","ItensEnviados","ItensExcluidos","ArqMorto");
                    foreach($pastas as $pasta){
                        mkdir($url."/pastas/".$pasta);
                    }

                    $xml = new DOMDocument("1.0");
                    
                    $xml_dados = $xml->createElement("dados");

                    $xml_nome = $xml->createElement("nome",$createNome);
                    $xml_sobrenome = $xml->createElement("sobrenome",$createSobrenome);
                    $xml_email = $xml->createElement("email",$createEmail);
                    $xml_senha = $xml->createElement("senha",$createSenha);
 
                    $xml_dados->appendChild($xml_nome);
                    $xml_dados->appendChild($xml_sobrenome);
                    $xml_dados->appendChild($xml_email);
                    $xml_dados->appendChild($xml_senha);

                    $xml->appendChild($xml_dados);
                    $xml->save($url."/dados.xml");
                    if(file_exists($url."/dados.xml")){
                        echo json_encode(1);
                    }else{
                        echo json_encode(-2);
                        
                    }
                }
            }
        }else{
               
        }
    }else{
       
    }
    exit()

    
?>