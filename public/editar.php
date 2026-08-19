
<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$prato = mysqli_query($conexao, "SELECT * FROM pratos WHERE id = $id");
$prato_dados = mysqli_fetch_assoc($prato);

$usuariosResult = mysqli_query($conexao, "SELECT id, nomeUsuario FROM usuarios ORDER BY nomeUsuario");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $descricao = mysqli_real_escape_string($conexao, $_POST["descricao"]);
    $preco = mysqli_real_escape_string($conexao, $_POST["preco"]);
    $categoria = mysqli_real_escape_string($conexao, $_POST["categoria"]);
    $usuario_id = mysqli_real_escape_string($conexao, $_POST["usuario_id"]);

    if (empty($nome) || empty($descricao) || empty($preco) || empty($categoria) || empty($usuario_id)) {
        $erro = "Todos os campos são obrigatórios!";
    } else if ($preco <= 0) {
        $erro = "O preço deve ser maior que zero!";
    } else {
        $sql = "UPDATE pratos SET nome='$nome', descricao='$descricao', preco='$preco', categoria='$categoria', usuario_id='$usuario_id' WHERE id=$id";

        if (mysqli_query($conexao, $sql)) {
            $sucesso = "Prato atualizado com sucesso!";
            header("Refresh: 2; url=../index.php");
        } else {
            $erro = "Erro ao atualizar prato: " . mysqli_error($conexao);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Prato - CRUD Restaurante</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <header>
        <h1> CRUD - Restaurante</h1>
    </header>

    <main>
        <section class="formulario-container">
            <div class="voltar">
                <a href="../index.php">← Voltar</a>
            </div>

            <h2> Editar Prato</h2>

            <?php if (isset($erro)) { ?>
                <div class="alerta alerta-erro">
                     <?php echo $erro ?>
                </div>
            <?php } ?>

            <?php if (isset($sucesso)) { ?>
                <div class="alerta alerta-sucesso">
                     <?php echo $sucesso ?><br>
                    <small>Redirecionando...</small>
                </div>
            <?php } ?>

            <form method="POST" class="formulario">
                <div class="grupo-form">
                    <label for="nome">Nome do Prato:</label>
                    <input 
                        type="text" 
                        id="nome"
                        name="nome" 
                        required
                        value="<?php echo htmlspecialchars($prato_dados["nome"]) ?>"
                    >
                </div>

                <div class="grupo-form">
                    <label for="descricao">Descrição:</label>
                    <textarea 
                        id="descricao"
                        name="descricao" 
                        rows="4"
                        required
                    ><?php echo htmlspecialchars($prato_dados["descricao"]) ?></textarea>
                </div>

                <div class="grupo-form">
                    <label for="preco">Preço:</label>
                    <input 
                        type="number" 
                        id="preco"
                        name="preco" 
                        step="0.01"
                        min="0"
                        required
                        value="<?php echo htmlspecialchars($prato_dados["preco"]) ?>"
                    >
                </div>

                <div class="grupo-form">
                    <label for="categoria">Categoria:</label>
                    <select id="categoria" name="categoria" required>
                        <option value="entrada" <?php echo $prato_dados["categoria"] == "entrada" ? "selected" : "" ?>>Entrada</option>
                        <option value="prato_principal" <?php echo $prato_dados["categoria"] == "prato_principal" ? "selected" : "" ?>>Prato Principal</option>
                        <option value="sobremesa" <?php echo $prato_dados["categoria"] == "sobremesa" ? "selected" : "" ?>>Sobremesa</option>
                        <option value="bebida" <?php echo $prato_dados["categoria"] == "bebida" ? "selected" : "" ?>>Bebida</option>
                    </select>
                </div>

                <div class="grupo-form">
                    <label for="usuario_id"> Responsável pelo Prato:</label>
                    <select id="usuario_id" name="usuario_id" required>
                        <option value="">-- Selecione um usuário --</option>
                        <?php 
                        if (mysqli_num_rows($usuariosResult) > 0) {
                            while ($usuario = mysqli_fetch_assoc($usuariosResult)) {
                                $selected = ($prato_dados['usuario_id'] == $usuario['id']) ? 'selected' : '';
                                echo "<option value='{$usuario['id']}' $selected>{$usuario['nomeUsuario']}</option>";
                            }
                        } else {
                            echo "<option value='' disabled>Nenhum usuário cadastrado</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="grupo-botoes">
                    <button type="submit" class="btn btn-sucesso">
                         Atualizar Prato
                    </button>
                    <a href="../index.php" class="btn btn-cancelar">
                         Cancelar
                    </a>
                </div>
            </form>
        </section>
    </main>



</body>

</html>

