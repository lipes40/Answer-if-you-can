<?php

require("connector.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];
    $lingua = "Português";

    if($nome == "ADM") {
        die("Você não é o ADM seu coco");
    }

    $sql = ("INSERT INTO resp (nome, pergunta, resposta, lingua) VALUES (?, ?, ?, ?)");
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $pergunta, $resposta, $lingua]);

    Header("Location: index.php");
    exit;
}

else{
    die("Algo de errado não está certo, volte e tente novamente");
}

?>