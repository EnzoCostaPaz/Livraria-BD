<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/CadastroCss/CadasroCss.css">
    <link rel="shortcut icon" type="imagex/png" href="../../IMGs/icon.ico">
    <title>CadastrarAutor</title>
</head>
<body>
    <form name="Autor" action="" method="post">
        <fieldset id="a">
            <legend><b>Dados do autor:</b></legend>
                <p>Nome: <input name="txtNome" type="text" size="80" maxlength="80" placeholder="Nome do Autor"></p>
                <p>Sobrenome: <input name="txtSobNome" type="text" size="80" maxlength="80" placeholder="Sobrenome do Autor"></p>
                <p>Email: <input name="txtEmail" type="text" size="50" maxlength="50" placeholder="Email do Autor"></p>
                <p>Data de Nascimento: <input name="txtNasc" type="date" size="80" maxlength="80" placeholder="Data de Nascimento do Autor"></p>
            </fieldset>
            <fieldset id="b">
            <legend><b>Opções:</b></legend>
            <br>
                <input name="btenviar" type="submit" value="Cadastrar Autor">
                <input name="limpar" type="reset" value="Limpar">
            </fieldset>
            <br><center>
            <button><a href="../../Login/MenuLivraria.html">Voltar</a></button>
            <button><a href="../Listar/ListarAut.php">Visualizar Lista</a></button>
            </center>
    </form>
</body>
</html>
<?php
extract($_POST, EXTR_OVERWRITE);
if(isset($btenviar)){

    include_once '../Autor.php';
    $pro = new autor();
    $pro -> setAutor($txtNome);
    $pro ->setSobrenome($txtSobNome);
    $pro->setEmail($txtEmail);
    $pro->setNasc($txtNasc);

    echo "<h3><br><br>" . $pro->salvar()."</h3>";
}
?>

</html>