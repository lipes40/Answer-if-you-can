<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crate a Question!</title>
    <style>
        body{
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 50px;
        }
    </style>
</head>
<body>
    <header><h1>Crate a Question!</h1></header>

    <form action="pergunta_criada.php" method="POST">
        <input type="text" placeholder="Nome" name="nome">
        <input type="text" placeholder="Pergunta" name="pergunta">
        <input type="text" placeholder="Resposta" name="resposta">
        <button type=>Enviar</button>
    </form>

</body>
</html>