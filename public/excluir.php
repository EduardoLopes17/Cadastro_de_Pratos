<?php
include "../infra/conexao.php";
$id = $_GET["id"];

$sql = "DELETE FROM pratos WHERE id = $id";

if (mysqli_query($conexao, $sql)) {
    header("Location: ../index.php?sucesso=Prato excluído com sucesso!");
} else {
    header("Location: ../index.php?erro=Erro ao excluir prato!");
}

?>