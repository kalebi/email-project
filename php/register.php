<?php
    if($_POST){
        extract($_POST);
        if(isset($createNome,$createSobrenome,$createEmail,$createSenha)){
            $diretorio = dir("../xml/users");
            $exists = false;
            $cont = 0;

            while(($dir = $diretorio->read()) !== false){
                $cont ++;
                //procurar no xml
                if($dir != '.' $$ $dir != '..'){
                    $xml_string = file_get_contents("../xml/users/".$dir."/data.xml");
                    $xml = simplexml_load_string($xml_string);

                    if(xml->createEmail == $usuario){
                        $exists = true;
                    }

                    //criar com proximo id
                    $array_atual = explode("_",$dir);
                    $atual = $array_atual[1];
                    if(!isset($maior)){
                        $maior = $atual;
                    }else if($maior < $atual){
                        $maior = $atual;

                    }
                }
            }

            if($cont == 2){
                $maior = 0; 
            }

            if($exists){
                echo json_encode(2);
            }else{
                $url = "../xml/users/user_".($maior + 1);
                if(!file_exists($url)){
                    mkdir($url);
                    mkdir($url."/emails");
                    $folder = array("Favoritos","CaixaEntrada","LixoEletronico","Rascunho","ItensEnv","ItensEx","ArqMorto");
                    foreach($folder as $folder){
                        mkdir($url."/emails/".$folder);
                    }

                    $xml = new DOMDocument("1.0");

                    $raiz = $xml->createElement("data");

                    $name = $xml->createElement("createNome",$createNome);
                    $lastname = $xml->createElement("createSobrenome",$createSobrenome);
                    $email = $xml->createElement("createEmail",$createEmail);
                    $password = $xml->createElement("createSenha",$createSenha);

                    $raiz->appendChild($name);
                    $raiz->appendChild($lastname);
                    $raiz->appendChild($email);
                    $raiz->appendChild($password);

                    $xml->appendChild($raiz);
                    $xml->save($url."/data.xml");
                    if(file_exists($url."/data.xml")){
                        echo json_encode(1);
                    }else{
                        echo json_encode(3);
                    }


                }
            }

        }
    }

    exit();
?>