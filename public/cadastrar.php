<?php

include "../infra/conexao.php";

$nomePrato = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];

$sql = "INSERT INTO pratos (nome,descricao,preco,categoria) VALUES (? ,?,?,?)";

$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "ssdss", $nomePrato, $descricao, $preco, $categoria);
mysqli_stmt_execute($stmt);

header("Location: ../index.php");
?>