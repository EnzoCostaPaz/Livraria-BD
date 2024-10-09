<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autoria</title>
    <link rel="stylesheet" href="../../CSS/AltCss/AltCSS.css">
    <link rel="shortcut icon" type="imagex/png" href="../../IMGs/icon.ico">
</head>
<body>
    <center>
        <font face="Century Gothic" size="6"><b>Verifique os Dados da Autoria Cadastrado</b></font>
        <fieldset>
        <?php
           
           $txtid1 = $_POST['txtidLivro'];
           $txtid2 = $_POST['txtidAutor'];
           include_once '../Autoria.php';


           $p = new Autoria();
           $p->setCod_Livro($txtid1);
           $p->setCod_Autor($txtid2);

           extract($_POST,EXTR_OVERWRITE);
           {
               if (isset ($btnAlterar)) {
                   include_once '../Autoria.php';
                   $pro = new Autoria();
                   $pro->setCod_Autor($txtidAutor);
                   $pro->setCod_Livro($txtidLivro);
                   $pro->setDataLacamento($txtDataL);
                   $pro->setEditora($txtEdiNova);
                   echo "<br><h3>". $pro->alterar2() . "</h3>"; 

               }
           }

           $p->setCod_Autor($txtidAutor);
           $p->setCod_Livro($txtidLivro);
           $pro_bd = $p->alterar();
        ?>
        <br>
        <form name="cliente2" action="" method="post">
            <?php
                foreach ($pro_bd as $pro_mostrar) {
            ?>
            <input type="hidden" name="txtidAutor" size="5" value='<?php echo ($pro_mostrar[0]) ?>'>
            <input type="hidden" name="txtidLivro" size="5" value='<?php echo ($pro_mostrar[1]) ?>'>
            <b><?php echo "ID do Autor: " . ($pro_mostrar[0]) ?></b>
            <b><?php echo "ID do Livro: " . ($pro_mostrar[1]) ?></b>
            <br><br><b><?php echo "Data de Lançamento: ";?></b>
            <input type="date" name="txtDataL" size="30" value='<?php echo ($pro_mostrar[2]) ?>'>
            <br><br><b><?php echo "Editora Antiga: "; ?></b>
            <input type="text" name="txtEdiNova" size="30" value='<?php echo ($pro_mostrar[3]) ?>'> 
            <br><br>
            <input type="submit" value="Alterar" name="btnAlterar">

            <br>
            <?php
                }
            ?>
        </form>

        </fieldset>
        <button><a href="../../Login/MenuLivraria.html">Voltar</a></button>
    </center>
</body>
</html>
