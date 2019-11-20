<?php
    $nome = $_POST["nome"]; 
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmar = $_POST["confirmar"];

    $xml = new DOMDocument("1.0");

    $xml_dados = $xml -> createElement("dados");

    $xml_nome = $xml->createElement("nome", $nome);
    $xml_sobrenome = $xml->createElement("sobrenome", $sobrenome);
    $xml_email = $xml->createElement("email", $email);
    $xml_senha = $xml->createElement("senha", $senha);
    $xml_confirmar = $xml->createElement("confirmar", $confirmar);

    $xml_dados->appendChild($xml_nome);
    $xml_dados->appendChild($xml_sobrenome);
    $xml_dados->appendChild($xml_email);
    $xml_dados->appendChild($xml_senha);
    $xml_dados->appendChild($xml_confirmar);

    $xml->appendChild($xml_dados);
    $xml->save("dados.xml");

    echo json_encode("Usuário gravado com sucesso!");
?>