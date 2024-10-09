<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Autor</title>
    <link rel="stylesheet" href="../../CSS/DeletarCss/Delet.css">
    <link rel="shortcut icon" type="imagex/png" href="../../IMGs/icon.ico">
</head>
<body>
<form name="Autor" action="" method="post">
        <fieldset name="a">
    <legend><b>Informe o Codigo do Autor</b></legend>
    <p><b>Codigo do Autor</b> <input type="text" name="AutorExcluir" id="boxText" size="60" maxlength="60"></p>
        <center>
            <input name="btnEnviar" type="submit" value="Deletar">
            <input name="limpar" type="reset" value="resetar">
        </fieldset>
        <fieldset id="b">
            <legend><b>Resultado</b></legend>
            <?php
            extract($_POST,EXTR_OVERWRITE);
            if (isset($btnEnviar)) {
                include_once '../Autor.php';
                $p = new autor();
                $p->setCod_Autor($AutorExcluir);
                echo "<h3>". $p->exclusao()."</h3>";
            }
?>
            </fieldset>
            <center>
            <button><a href="../../Login/MenuLivraria.html">Voltar</a></button>
            <button><a href="../Listar/ListarAut.php">Visualizar Lista</a></button>
        </center>
        </form>
    </form>
</body>
</html>