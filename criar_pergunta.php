<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crate a Question!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <header><h1>Create a Question</h1></header>

    <form action="pergunta_criada.php" method="POST">
        <input type="text" placeholder="Nome" name="nome">
        <input type="text" placeholder="Pergunta" name="pergunta">
        <input type="text" placeholder="Resposta" name="resposta">
        <button type=>Send <i class="fas fa-paper-plane"></i></button>
    </form>

    <a class="back-btn" href="index.php">Back</a>

    <footer>&copy; 2025 Made by Fellipe Teixeira and Felipe Falcirolli.</footer>
</body>
</html>