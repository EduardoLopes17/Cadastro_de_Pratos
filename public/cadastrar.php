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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    
</body>
</html>

<h2>Adicione um novo prato!</h2>

            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao">
            <br>
            <label for="preco">Preço:</label>
            <input type="number" name="preco" step="0.01">
            <br>

            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria">
            <option value="entrada">Entrada</option>
            <option value="prato_principal">Prato Principal</option>
            <option value="sobremesa">Sobremesa</option>
            <option value="bebida">Bebida</option>
            </select>

            <br>
            <button type="submit">Cadastrar</button>
        </form>