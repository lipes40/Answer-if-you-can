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

        a{
            position: absolute;
            bottom: 20px;
            color: black;
        }
    </style>
</head>
<body>
    <header><h1>Crate a Question!</h1></header>

    <form action="pergunta_criada.php" method="POST" onsubmit="return finalizar()">
        <input type="text" maxlength="40" placeholder="Nome" id="nome" name="nome" value="<?php echo $_POST["nome"] ?? '' ?>">
        <input type="text" maxlength="200" placeholder="Pergunta" id="pergunta" name="pergunta" value="<?php echo $_POST["pergunta"] ?? '' ?>">
        <input type="text" maxlength="200" placeholder="Resposta" id="resposta" name="resposta" value="<?php echo $_POST["resposta"] ?? '' ?>">
        <button type=>Enviar</button>
    </form>

    <a href="index.php">Deixa pra lá! Quero mesmo é responder</a>

</body>

<script>

    const nome = document.getElementById("nome");
    const pergunta = document.getElementById("pergunta");
    const resposta = document.getElementById("resposta");

    function finalizar() {
        if(!nome.value){
            alert("Digite seu nome")
            alert(nome)
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