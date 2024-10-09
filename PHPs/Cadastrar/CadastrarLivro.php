<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/CadastroCss/CadasroCss.css">
    <link rel="shortcut icon" type="imagex/png" href="../../IMGs/icon.ico">

    <title>Cadastrar Livro</title>
    <script>
        function mascaraISBN(input) {
            var valor = input.value.replace(/\D/g, '');

            if (valor.length > 3) {
                valor = valor.replace(/^(\d{3})(\d)/, '$1-$2');
            }
            if (valor.length > 4) {
                valor = valor.replace(/^(\d{3})-(\d{10})(\d)/, '$1-$2');
            }
            input.value = valor;
        }
    </script>
</head>
<body>
    <form name="Livro" action="" method="post">
        <fieldset id="a">
            <legend><b>Dados do livro:</b></legend>
                <p>Titulo: <input name="txtTitu" type="text" size="80" maxlength="80" placeholder="Nome do Livro"></p>
                <p>Categoria: <input name="txtCateg" type="text" size="80" maxlength="80" placeholder="Categoria do livro"></p>
                <p>ISBN: <input id="txtISBN" name="txtISBN" type="text" size="50" maxlength="13" placeholder="ISBN-13 do livro" onkeyup="mascaraISBN(this)"></p>
                <p>Idioma: <input name="txtIDio" type="text" size="80" maxlength="80" placeholder="Idioma do Livro"></p>
                <p>Quantidade de Páginas: <input name="txtPag" type="number" size="80" maxlength="80" placeholder="Quantidade de páginas do livro"></p>
        </fieldset>
        <fieldset id="b">
            <legend><b>Opções:</b></legend>
            <br>
            <input name="btenviar" type="submit" value="Cadastrar Livro">
            <input name="limpar" type="reset" value="Limpar">
        </fieldset>
        <br><center>
            <button><a href="../../Login/MenuLivraria.html">Voltar</a></button>
            <button><a href="../Listar/ListarLiv.php">Visualizar Lista</a>
        </center>
    </form>
</body>
</html>
<?php
extract($_POST, EXTR_OVERWRITE);
if(isset($btenviar)){

    include_once '../Livros.php';
    $pro = new livro();
    $pro -> setTitulo($txtTitu);
    $pro ->setCategoria($txtCateg);
    $pro->setISBN($txtISBN);
    $pro->setIdioma($txtIDio);
    $pro->setQtdePag($txtPag);

    echo "<h3><br><br>" . $pro->salvar()."</h3>";
}
?>
