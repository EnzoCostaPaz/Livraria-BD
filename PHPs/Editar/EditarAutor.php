<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <link rel="stylesheet" href="../../CSS/AltCss/AltCSS.css">
    <link rel="shortcut icon" type="imagex/png" href="../../IMGs/icon.ico">

</head>
<body>
 <center><font face = "Century Gothic" size = "6"><b>Alteração de Autores Cadstrados</b></font>
    <br><br>
    <form name="cliente" action="./EditarAutor2.php" method="post">
        <fieldset>
            <legend><b>Informe o ID do Autor desejado:</b></legend>
            <p><b>ID:</b> <input type="text" name="txtid" size="20" maxlength="5" placeholder="ID do Autor"></p>
            <center>
                <input type="submit" value="Consultar" name="btnenviar">
                <input type="reset" value="Limpar" name="limpar">
            </center>
        </fieldset>
    </form>
    <br>
    <button><a href="../../Login/MenuLivraria.html">Voltar</a></button>
</center>
<br><br>
</body>
</html>