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

    <form action="pergunta_criada.php" method="POST" onsubmit="return finalizar()">
        <input type="text" maxlength="40" placeholder="Nome" id="nome" name="nome" value="<?php echo $_POST["nome"] ?? '' ?>">
        <input type="text" maxlength="200" placeholder="Pergunta" id="pergunta" name="pergunta" value="<?php echo $_POST["pergunta"] ?? '' ?>">
        <input type="text" maxlength="200" placeholder="Resposta" id="resposta" name="resposta" value="<?php echo $_POST["resposta"] ?? '' ?>">
        <button type=>Send <i class="fas fa-paper-plane"></i></button>
    </form>

       <a class="back-btn" href="index.php">Back</a>

    <footer>&copy; 2025 Made by Fellipe Teixeira and Felipe Falcirolli.</footer>
</body>

<script>

    const nome = document.getElementById("nome");
    const pergunta = document.getElementById("pergunta");
    const resposta = document.getElementById("resposta");

    function finalizar() {
        if(!nome.value){
            alert("Digite seu nome")
            return false;
        }

        if(nome.value.length >= 40){
            alert("Nome inválido")
        }

        if(!pergunta.value){
            alert("Digite a sua pergunta")
            return false;
        }

        if(pergunta.value.length >= 200){
            alert("Pergunta inválida")
        }

        if(!resposta.value){
            alert("Digite a sua resposta")
            return false;
        }

        if(resposta.value.length >= 200){
            alert("Resposta inválida")
        }

        return true;
    }
</script>

</html>