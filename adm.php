<?php

require('connector.php');   

$verify = false;

$error = "";
$senha_certa = "Adm1234";

if(isset($_POST["senha"])){
    if(strlen($_POST["senha"] == 0)){
        $error = "Preencha sua senha";
    }
    else{
        if($_POST["senha"] != $senha_certa){
            $error = "senha incorreta";
        }
        else{
            $verify = true;
        }
    }
}

if($verify){

    $sql = "SELECT id FROM selections";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    $i = count($ids) - 1;

    $minimo = 0;    
    $maximo = $i;

    $vez = rand($minimo, $maximo);

    $id = $ids[$vez];


    $sql = "SELECT * FROM selections WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $conjunto = $stmt->fetch();

    $id = $conjunto[0];
    $nome = $conjunto[1];
    $pergunta = $conjunto[2];
    $resposta = $conjunto[3];
    $lingua = $conjunto[4];
    
    
     
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

    <form action="">
        <button type="submit">Pular<i class="fas fa-paper-plane"></i></button>
        <button type="submit">Reprovar<i class="fas fa-paper-plane"></i></button>
        <button type="submit">Aprovar<i class="fas fa-paper-plane"></i></button>
    </form>
</body>
</html>