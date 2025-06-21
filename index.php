<?php 

require('connector.php');

session_start();

$error = "";


$sql = "SELECT id FROM resp";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

$minimo = min($ids) -1;
$maximo = max($ids) -1;

if(!isset($_SESSION["vez"])){
    
    $_SESSION["vez"] = rand($minimo, $maximo);
}


$id = $ids[$_SESSION["vez"]];

$sql = "SELECT * FROM resp WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

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
            $num = $_SESSION["vez"];

            while($num == $_SESSION["vez"]){
                $num = rand($minimo, $maximo);
            }

            $_SESSION["vez"] = $num;

            $error = "Acertou";

            flush();
            echo "<script> window.location.href = 'index.php' </script>";
            exit;
        }

        else{
            $error = "Errado";
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>



</head>
<body>
    <div class="menu">
        <button onclick="modalCreditos()"><i class="fas fa-file-alt btn-menu"></i></button>
    </div>

   <div class="modal" id="modalCreditos">
  <div class="credits-modal">
    <h2>Créditos</h2>
        <p><strong>Felipe Falcirolli</strong> — Full Stack Developer<br>
        <em>Developed the user interface and interactive components</em><br>
        <a href="https://github.com/lipe7k" target="_blank" rel="noopener noreferrer">Github</a>
        </p>
        <p><strong>Fellipe Teixeira</strong> — Backend Developer<br>
        <em>Creator, back end maker and database analitics</em><br>
            <a href="https://github.com/lipes40" target="_blank" rel="noopener noreferrer">Github</a>
        </p>
    <button onclick="fecharModal()" class="btn-fechar">Fechar</button>
  </div>
</div>



    <header>
        <h3 class="lingua">Language: <?php echo $lingua; ?></h3>
        <h1>Answer if you can</h1>
        <h3 class="pessoa">Question asked by: <?php echo $nome; ?></h3>
    </header>
    

    <form action="" method="POST">
        <h3><?php echo $pergunta ?></h3>
        <input type="text" placeholder="Resposta" value="<?php echo $_POST["resposta"] ?? '' ?>" name="resposta" id="resposta">
        <button type="submit">Send <i class="fas fa-paper-plane"></i></button>
    </form>
        <span><?php if($error != "") { echo $error; } ?></span>

        <a href="pular_pergunta.php"><button type="submit" name="pular">Pular pergunta</button></a>


        <a href="criar_pergunta.php" class="criar-pergunta">Crie sua pergunta!</a>

    <footer>&copy; 2025 Made by Fellipe Teixeira and Felipe Falcirolli.</footer>

    <script src="script.js"></script>
</body>
</html>