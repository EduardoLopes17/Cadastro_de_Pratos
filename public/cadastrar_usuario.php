<?php

include "../infra/conexao.php";

$nome = $_POST["nomeUsuario"];
$email = $_POST["emailUsuario"];
$senha = $_POST["senhaUsuario"];

$sql = "INSERT INTO usuarios (nome,email,senha) VALUES ('$nome','$email','$senha')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <main>
        <h2>Informe o seu usuario!</h2>
    
            
           
 
           

</body>
</html>
