<?php 

require('connector.php');

session_start();

if(!isset($_SESSION["vez"])){
    
    $_SESSION["vez"] = 0;
}

else{
    $error = "";
}

$error = "";

$sql = "SELECT id FROM resp";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

if(MAX($ids) <= $_SESSION["vez"]) {
    //$_SESSION["vez"] = 0;
    session_destroy();
    Header("Location: index.php");
    exit;
}


$id = $ids[$_SESSION["vez"]];

$sql = "SELECT * FROM resp WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$_SESSION["vez"] == 0;



$conjunto = $stmt->fetch();

$pergunta = $conjunto['pergunta'];
$resposta = $conjunto['resposta'];
$lingua = $conjunto['lingua'];
$nome = $conjunto['nome'];


if(isset($_POST["resposta"])){
    if(strlen($_POST["resposta"]) == 0){
        $error = "Preencha sua resposta!";
    }
    else{
        $tentativa = $_POST["resposta"];
        if($tentativa == $resposta) {
            $_POST["resposta"] = null;
            $_SESSION["vez"] += 1;
            sleep(1);
            $error = "Acertou";
            Header("Location: index.php");
            exit;
        }

        else{
            $error = "Errou";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer if you can</title>

    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form{
            display: flex;
            gap: 10px;
            flex-direction: column;
        }

        span{
            margin-top: 20px;
            color: red;
        }

        .pessoa{
            position: absolute;
            right: 20px;
            top: 20px;
        }

        .lingua{
            position: absolute;
            left: 20px;
            top: 20px;
        }

        a{
            color: black;
        }

    </style>


</head>
<body>
    <header>
        <h3 class="lingua">Language: <?php echo $lingua; ?></h3>
        <h1>Answer if you can</h1>
        <h3 class="pessoa">Question asked by: <?php echo $nome; ?></h3>
    </header>

    <h1>Reply:</h1>

    <h3><?php echo $pergunta ?></h3>

    <form action="" method="POST">
        <input type="text" placeholder="Resposta" value="<?php echo $_POST["resposta"] ?? '' ?>" name="resposta" id="resposta">
        <button type="submit">Enviar</button>
    </form>
        <span><?php if($error != "") { echo $error; } ?></span>


        <a href="criar_pergunta.php">Crie sua pergunta!</a>
</body>
</html>