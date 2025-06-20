<?php

//echo "ok";

$usuario = "root";
$senha = "";
$dbname = "answer";
$host = "localhost";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
}

catch(PDOException $e) {
    echo $e->getMessage();
}

?>