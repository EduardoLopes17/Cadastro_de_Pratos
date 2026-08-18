<?php

include "../infra/conexao.php";

$nomePrato = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];

$sql = "INSERT INTO pratos (nome,descricao,preco,categoria) VALUES ('$nomePrato','$descricao','$preco','$categoria')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
?>