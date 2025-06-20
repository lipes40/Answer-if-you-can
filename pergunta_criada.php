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

    $sql = ("SELECT id FROM resp");
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $conjunto = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    $id = max($conjunto) + 1;

    $sql = ("INSERT INTO resp (id, nome, pergunta, resposta, lingua) VALUES (?, ?, ?, ?, ?)");
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $nome, $pergunta, $resposta, $lingua]);

    sleep(2);

    echo "<script> window.location.href = 'index.php' </script>";
    exit;
}

else{
    die("Algo de errado não está certo, volte e tente novamente");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pergunta criada com sucesso!</title>
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <h1>Sua pergunta foi criada e logo mais aparecerá</h1>
</body>
    <script>
        sleep(2)
        window.location.href = 'index.php';
    </script>
</html>