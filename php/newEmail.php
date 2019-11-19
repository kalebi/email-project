<?php
    include("funcao.php");
    if($_POST){
        extract($_POST);
        if(isset($new_para,$new_cc,$new_assunto,$new_texto)){
            session_start();
            extract($_SESSION);

            $url = "../xml/users/user_".$id."/email";
            if(!file_exists($url)){
                mkdir($url);   
            }
            $archives = arrayEmails($url);
            sort($archives);
            $len = sizeof($archives);
            if($len == 0){
                $last = 1;
            }else{
                $max = 0;
                foreach($archives as $archive){

                    $array_arc = explode(".", $archive);
                    $array_last = explode("_", $array_arc[0]);
                    $last = $array_last[sizeof($array_last)-1];
                    if($max < $last){
                        $max = $last;
                    }
                }
                $last = $max+1;
            }
            $xml = new DOMDOcument("1.0");

            $data = $xml->createElement("data");

            $email_para = $xml->createElement("para", $new_para);
            $email_cc = $xml->createElement("cc", $new_cc);
            $email_assunto = $xml->createElement("assunto", $new_assunto);
            $email_texto = $xml->createElement("texto", $new_texto);

            $data->appendChild($email_para);
            $data->appendChild($email_cc);
            $data->appendChild($new_assunto);
            $data->appendChild($new_texto);

            $xml->appendChild($data);
            $load_url = $url
        }
    }
?>