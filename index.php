<?php

include "infra/conexao.php";
$pratos = mysqli_query($conexao, "SELECT * FROM pratos");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Restaurante</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Restaurante</h1>
    </header>
    <main>


        <form action="public/cadastrar.php" method="POST">
            
            <h2>Informe o seu usuario!</h2>
    
            <label for="nome">Nome Usuário:</label>
            <input type="text" name="nome">
            <br>
            <label for="descricao">Email:</label>
            <input type="text" name="email">
           
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
        <div>
            <h2>Pratos Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
                <?php while ($prato = mysqli_fetch_assoc($pratos)) { ?>
                    <tr>
                        <td><?php echo $prato["id"] ?></td>
                        <td><?php echo $prato["nome"] ?></td>
                        <td><?php echo $prato["descricao"] ?></td>
                        <td><?php echo $prato["preco"] ?></td>
                        <td><?php echo $prato["categoria"] ?></td>
 
                        <td>
                            <a href="public/editar.php?id=<?php echo $prato["id"] ?>">Editar</a>
                            <a href="public/excluir.php?id=<?php echo $prato["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </main>
    <footer>

    </footer>


</body>

</html>