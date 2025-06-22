<?php

require("connector.php");

$error = "";

if(isset($_POST["nome"]) && isset($_POST["pergunta"]) && isset($_POST["resposta"])){
    if(strlen($_POST["nome"]) == 0) {
        $error = "Preencha seu nome!";
    }
    else{
        if(strlen($_POST["pergunta"]) == 0){
            $error = "Preencha a pergunta!";
        }
        else{
            if(strlen($_POST["resposta"]) == 0){
                $error = "Preencha a resposta!"; 
            }
            else{

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

                Header("Location: index.php");
                exit;
            }

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crate a Question!</title>

    <link rel="stylesheet" href="UI/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

</head>
<body>
    <header><h1>Create a Question</h1></header>

    <form action="" method="POST">
        <input type="text" maxlength="40" placeholder="Nome" id="nome" name="nome" value="<?php echo $_POST["nome"] ?? '' ?>">
        <input type="text" maxlength="200" placeholder="Pergunta" id="pergunta" name="pergunta" value="<?php echo $_POST["pergunta"] ?? '' ?>">
        <input type="text" maxlength="200" placeholder="Resposta" id="resposta" name="resposta" value="<?php echo $_POST["resposta"] ?? '' ?>">
        <button type=>Send <i class="fas fa-paper-plane"></i></button>
    </form>
    <span><?php echo $error; ?></span>

    <a class="back-btn" href="index.php">Back</a>

</body>
</html>