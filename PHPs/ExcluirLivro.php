<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Livro</title>
    <link rel="stylesheet" href="../CSS/DeletarCss/Delet.css">
</head>
<body>
<form name="Autor" action="" method="post">
        <fieldset name="a">
    <legend><b>Informe o Codigo do Livro</b></legend>
    <p><b>Codigo do Livro</b> <input type="text" name="LivroExcluir" id="boxText" size="60" maxlength="60"></p>
        <center>
            <input name="btnEnviar" type="submit" value="Deletar">
            <input name="limpar" type="reset" value="resetar">
        </fieldset>
        <fieldset id="b">
            <legend><b>Resultado</b></legend>
            <?php
            extract($_POST,EXTR_OVERWRITE);
            if (isset($btnEnviar)) {
                include_once './Livros.php';
                $p = new livro();
                $p->setCod_Livro($LivroExcluir);
                echo "<h3>". $p->exclusao()."</h3>";
            }
?>
            </fieldset>
            <center>
            <button><a href="../MenuLivraria.html">Voltar</a></button>
            <button><a href="../PHPs/ListarLiv.php">Visualizar Lista</a></button>
        </center>
        </form>
    </form>
</body>
</html>