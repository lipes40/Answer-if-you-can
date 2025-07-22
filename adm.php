<?php

require('connector.php');   

session_start();

if(!isset($_SESSION["verify"]))
    $_SESSION["verify"] = false;

$error = "";
$senha_certa = "Adm1234";

if(isset($_POST["senha"])){
    if(strlen($_POST["senha"] == 0)){
        $error = "Preencha sua senha";
        $_SESSION["verify"] = false;
    }
    else{
        if($_POST["senha"] != $senha_certa){
            $error = "senha incorreta";
            $_SESSION["verify"] = false;
        }
        else{
            $_SESSION["verify"] = true;
        }
    }
}

if($_SESSION["verify"]){

    $sql = "SELECT id FROM selections";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    // $_SESSION["id"] = false;

    if($ids){
        if(!isset($_SESSION["id"])){
            $i = count($ids) - 1;

            $minimo = 0;    
            $maximo = $i;

            $vez = rand($minimo, $maximo);

            $_SESSION["id"] = $ids[$vez];
        }


        $sql = "SELECT * FROM selections WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION["id"]]);

        $conjunto = $stmt->fetch();

        $id = $conjunto[0];
        $nome = $conjunto[1];
        $pergunta = $conjunto[2];
        $resposta = $conjunto[3];
        $lingua = $conjunto[4];

        if(isset($_POST["reprovar"])){
            $sql = "DELETE FROM selections WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_SESSION["id"]]);
            $_SESSION["id"] = null;
            header("Location: adm.php");
        }

        if(isset($_POST["pular"])){
            $_SESSION["id"] = null;
            header("Location: adm.php");
        }

        if(isset($_POST["aprovar"])){
            $sql = ("SELECT id FROM resp");
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $new_ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

            $new_id = max($new_ids) + 1;

            echo $new_id;

            $sql = ("INSERT INTO resp (id, nome, pergunta, resposta, lingua) VALUES (?, ?, ?, ?, ?)");
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$new_id, $nome, $pergunta, $resposta, $lingua]);
            
            $sql = "DELETE FROM selections WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_SESSION["id"]]);
            $_SESSION["id"] = null;
            header("Location: adm.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Digite a senha para acessar</h1>
        <input type="text" placeholder="Senha" name="senha" id="senha">
        <button type="submit">Send <i class="fas fa-paper-plane"></i></button>
    </form>

    <h4>Id: <?php echo $id ?? "Não há nada aqui"?></h4>
    <h4>Nome: <?php echo $nome ?? "Não há nada aqui"?></h4>
    <h4>Pergunta: <?php echo $pergunta ?? "Não há nada aqui"?></h4>
    <h4>Resposta: <?php echo $resposta ?? "Não há nada aqui"?></h4>
    <h4>Lingua: <?php echo $lingua ?? "Não há nada aqui"?></h4>

    <form action="" method="POST">
        <button type="submit" name="pular">Pular<i class="fas fa-paper-plane"> </i></button>
        <button type="submit" name="reprovar">Reprovar<i class="fas fa-paper-plane"></i></button>
        <button type="submit" name="aprovar">Aprovar<i class="fas fa-paper-plane"></i></button>
    </form>
</body>
</html>