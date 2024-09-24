<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autoria</title>
    <link rel="stylesheet" href="../../CSS/AltCss/AltCSS.css">
</head>
<body>
 <center><font face = "Century Gothic" size = "6"><b>Alteração de Livros Cadstrados</b></font>
    <br><br>
    <form name="cliente" action="./EditarAutoria2.php" method="post">
        <fieldset>
            <legend><b>Informe o ID do livro e do autor desejado:</b></legend>
            <br>
            <p><b>ID do Livro:</b> <input type="text" name="txtidLivro" size="20" maxlength="5" placeholder="ID do Livro"></p>
            <br>
            <p><b>ID do Autor:</b> <input type="text" name="txtidAutor" size="20" maxlength="5" placeholder="ID do Autor"></p>
            <center>
                <input type="submit" value="Consultar" name="btnenviar">
                <input type="reset" value="Limpar" name="limpar">
            </center>
        </fieldset>
    </form>
    <br>
    <button><a href="../../MenuLivraria.html">Voltar</a></button>
</center>
<br><br>
</body>
</html>