<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Livro</title>
    <link rel="stylesheet" href="../../CSS/PesqCss/Pesq.css">
</head>
<body>
    <form name="Autor" action="" method="post">
        <fieldset name="a">
    <legend><b>Informe o nome do livro</b></legend>
    <p><b>Nome do livro</b> <input type="text" name="nomePesq" id="boxText" size="60" maxlength="60"></p>
        <center>
            <input name="btnEnviar" type="submit" value="Consultar">
            <input name="limpar" type="reset" value="resetar">
        </fieldset>
        <fieldset id="b">
            <legend><b>Resultado</b></legend>
            <?php
            extract($_POST,EXTR_OVERWRITE);
            if (isset($btnEnviar)) {
                include_once '../Livros.php';
                $p = new livro();
                $p->setTitulo($nomePesq.'%');// '%' = busca aproximada, sem sensitive case
                $pro_bd = $p->consultar();//chama o metodo com retorno
                foreach ($pro_bd as $pro_mostrar) {
                    ?>
                    <b><?php echo "ID:".$pro_mostrar[0]; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    <b><?php echo "Nome:".$pro_mostrar[1]; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    <b><?php echo "Categoria:".$pro_mostrar[2]; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    <b><?php echo "ISBN:".$pro_mostrar[3]; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    <b><?php echo "Idioma:".$pro_mostrar[4]; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    <b><?php echo "Quantidade de Paginas: ".$pro_mostrar[5]; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br><br>
                    <?php
                }
            }
?>
            </fieldset>
            <center>
            <button><a href="../../Login/MenuLivraria.html">Voltar</a></button>
        </center>
        </form>
    </form>
</body>
</html>