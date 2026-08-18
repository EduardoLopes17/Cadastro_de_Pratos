<?php

include "../infra/conexao.php";

$nome_prato = $_POST["nome do prato"];
$descricao = $_POST["descrição"];
$preco = $_POST["preço"];
$categoria = $_POST["categoria"];

$sql = "INSERT INTO pratos (nome,descricao,preco,categoria) VALUES ('$nome_prato','$descricao','$preco','$categoria')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
?>