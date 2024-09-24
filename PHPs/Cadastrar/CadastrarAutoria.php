<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/CadastroCss/CadasroCss.css">
    <title>Cadastrar Autoria</title>
</head>
<body>
    <form name="Autoria" action="" method="post">
        <fieldset id="a">
            <legend><b>Dados da Editora:</b></legend>
            <p>Código do Autor: <input name="CodAutor" type="number" size="80" maxlength="80" placeholder="Informe o código do autor correspondente ao livro"></p>
            <p>Código do Livro: <input name="CodLivro" type="number" size="80" maxlength="80" placeholder="Informe o código do livro correspondente "></p>
            <p>Nome da Editora: <input name="txtNomeEdito" type="text" size="80" maxlength="80" placeholder="Nome da Editora"></p>
            <p>Data de Lançamento: <input name="DtEditora" type="date" size="80" maxlength="80" placeholder="Data de Lançamento do livro"></p>
        </fieldset>
        <fieldset id="b">
            <legend><b>Opções:</b></legend>
            <br>
            <input name="btenviar" type="submit" value="Cadastrar Autoria">
            <input name="limpar" type="reset" value="Limpar">
        </fieldset>
        <br>
        <center>
            <button><a href="../../MenuLivraria.html">Voltar</a></button>
            <button><a href="../Listar/ListarAutoria.php">Visualizar Lista</a></button>
        </center>
    </form>

    <?php
    if (isset($_POST['btenviar'])) {
        include_once '../Autoria.php';

        $pro = new Autoria();
        $pro->setCod_Autor($_POST['CodAutor']);
        $pro->setCod_Livro($_POST['CodLivro']);
        $pro->setEditora($_POST['txtNomeEdito']);
        $pro->setDataLacamento($_POST['DtEditora']);

        echo "<h3><br><br>" . $pro->salvar() . "</h3>";
    }
    ?>
</body>
</html>
