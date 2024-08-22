

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="../CSS/style.css"> <!-- Certifique-se de ajustar o caminho para o CSS -->
</head>
<body>
    <h2>Editar Livro</h2>
    <form action="" method="post">
        <input type="hidden" name="Cod_Livro" value="<?php echo $dados['Cod_Livro']; ?>">
        <label for="Titulo">Título:</label>
        <input type="text" name="Titulo" id="Titulo" value="<?php echo $dados['Titulo']; ?>" required><br>

        <label for="Categoria">Categoria:</label>
        <input type="text" name="Categoria" id="Categoria" value="<?php echo $dados['Categoria']; ?>" required><br>

        <label for="ISBN">ISBN:</label>
        <input type="text" name="ISBN" id="ISBN" value="<?php echo $dados['ISBN']; ?>" required><br>

        <label for="Idioma">Idioma:</label>
        <input type="text" name="Idioma" id="Idioma" value="<?php echo $dados['Idioma']; ?>" required><br>

        <label for="QtdePag">Quantidade de Páginas:</label>
        <input type="number" name="QtdePag" id="QtdePag" value="<?php echo $dados['QtdePag']; ?>" required><br>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
<?php
include_once 'Livro.php';

if (isset($_GET['Cod_Livro'])) {
    $livro = new Livro();
    $livro->setCod_Livro($_GET['Cod_Livro']);
    $resultado = $livro->alterar();

    if (count($resultado) > 0) {
        $dados = $resultado[0];
    } else {
        echo "Livro não encontrado!";
        exit;
    }
} else {
    echo "Código do livro não informado!";
    exit;
}
?>