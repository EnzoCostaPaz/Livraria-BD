<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="../../CSS/AltCss/AltCSS.css">
</head>
<body>
    <center>
        <font face "Century Gothic" size = "6"><b>Verifique os Dados do Livro Cadastros</b></font>
        <fieldset>
        <?php
            $txtid = $_POST['txtidLivro'];
            include_once '../Livros.php';
            $p = new livro();
            $p->setCod_Livro($txtid);
            
            extract($_POST, EXTR_OVERWRITE);
            if (isset($_POST['btnAlterar'])) {
                $p->setCod_Livro($txtid);
                $p->setTitulo($txtnome);
                $p->setCategoria($txtCateg);
                $p->setISBN($txtISBN);
                $p->setIdioma($txtIdi);
                $p->setQtdePag($txtPag);
                echo "<br><br><h3>" . $p->alterar2() . "</h3>";
            }

            $p->setCod_Livro($txtid);
            $pro_bd = $p->alterar();

            ?>
            <br>
            <form name="cliente2" action="" method="post">
    <?php
    foreach($pro_bd as $pro_mostrar){
    ?>
    <input type="hidden" name="txtidLivro" size = "5" value='<?php echo $pro_mostrar[0] ?>'>
    <b><?php echo "ID:". $pro_mostrar[0] //posição; ?></b>
    <br><br><b><?php echo "Nome do Livro: ";?></b>
    <input type="text" name="txtnome" size="30" value='<?php echo $pro_mostrar[1] ?>'>
    <br><br><b><?php echo "Categoria :"; ?></b>
    <input type="text" name="txtCateg" size="30" value='<?php echo $pro_mostrar[2] ?>'>
    <br><br>
    <b><?php echo "ISBN:" ?></b>
    <input type="text" name="txtISBN" size="30" value='<?php echo $pro_mostrar[3]?>'>
    <br><br>
    <b><?php echo "Idioma:" ?></b>
    <input type="text" name="txtIdi" size="30" value='<?php echo $pro_mostrar[4]?>'>
    <br><br>
    <b><?php echo "Qtde Paginas::" ?></b>
    <input type="text" name="txtPag" size="30" value='<?php echo $pro_mostrar[5]?>'>
    <br><br>
    
    
    <center>
    <input type="submit" value="Alterar" name="btnAlterar">
    <?php
    }        
    ?>
    </center>
</form>
        </fieldset>
    </center>
    <center>
        <button><a href="../../MenuLivraria.html">Voltar</a></button>
    </center>
</body>
</html>