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
        <section class="botoes-navegacao">
            <h2>O que você deseja fazer?</h2>
            <div class="container-botoes">
                <a href="public/cadastrar_usuario.php" class="btn btn-usuario">
                    Cadastrar Usuário
                </a>
                <a href="public/cadastrar.php" class="btn btn-prato">
                    Cadastrar Prato
                </a>
            </div>
        </section>
 
        <section class="pratos-cadastrados">
            <h2>Pratos Cadastrados</h2>
               <?php if (mysqli_num_rows($pratos) > 0) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($prato = mysqli_fetch_assoc($pratos)) { ?>
                            <tr>
                                <td><?php echo $prato["id"] ?></td>
                                <td><?php echo $prato["nome"] ?></td>
                                <td><?php echo $prato["descricao"] ?></td>
                                <td>R$ <?php echo number_format($prato["preco"], 2, ',', '.') ?></td>
                                <td><?php echo ucfirst(str_replace('_', ' ', $prato["categoria"])) ?></td>
                                <td class="acoes">
                                    <a href="public/editar.php?id=<?php echo $prato["id"] ?>" class="btn-editar">Editar</a>
                                    <a href="public/excluir.php?id=<?php echo $prato["id"] ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p class="vazio">Nenhum prato cadastrado ainda. Clique em "Cadastrar Prato" para começar! 👆</p>
            <?php } ?>
        </section>
 
    </main>
 
    <footer>
        <p>&copy; 2024 Sistema de Cadastro de Restaurante | Eduardo Lopes</p>
    </footer>
 
</body>
 
</html>
 