<?php
    if($_POST){
        extract($_POST);
        if(isset($email,$senha)){
            $diretorio = dir("../xml/users/");
            $cont = 0;
            $exist = false;
            while(($dir = $diretorio->read()) !== false){
                $cont++;
                $url = "../xml/users/".$dir;
                if(file_exists($url."/dados.xml")){
                    $str_xml = file_get_contents($url."/dados.xml");
                    $xml = simplexml_load_string($str_xml);
                    if($xml->email == $email && $xml->senha == $senha){
                        $exist = true;
                        $array_id = explode("_",$dir);
                        $id = $array_id[1];
                    }
                }
            }
            if($cont == 2){
                echo json_encode(-2);
            }else{
                if($exist){
                    session_start();
                    $_SESSION["id"] = $id;
                    $_SESSION["email"] = $email;
                    $_SESSION["senha"] = $senha;
                    echo json_encode(1);
                }else{
                    echo json_encode(-3);
                }
            }
        }else{
            echo json_encode(-1);
        }
    }else{
        Header("Location: ../html/login.html");
    }
    exit();
?>