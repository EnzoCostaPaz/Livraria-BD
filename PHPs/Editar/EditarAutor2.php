<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <link rel="stylesheet" href="../../CSS/AltCss/AltCSS.css">
</head>

<body>
    <center>
        <font face "Century Gothic" size="6"><b>Verifique os Dados do Autor Cadastrado</b></font>
        <fieldset>
            <?php
            $txtid = $_POST['txtid'];
            include_once '../Autor.php';
            $p = new autor();
            $p->setCod_Autor($txtid);
            $pro_bd = $p->alterar();

            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnAlterar)) {
                include_once '../Autor.php';
                $pro = new autor();
                $pro->setAutor($txtnome);
                $pro->setSobrenome($txtsobre);
                $pro->setEmail($txtEmail);
                $pro->setNasc($txtNasc);
                $pro->setCod_Autor($txtid);
                echo "<br><br><h3>" . $pro->alterar2() . "</h3>";
            }

            $p->setCod_Autor($txtid);
            $pro_bd = $p->alterar();
            ?>
            <br>
            <form name="cliente2" action="" method="post">
                <?php
                foreach ($pro_bd as $pro_mostrar) {
                ?>
                    <input type="hidden" name="txtid" size="5" value='<?php echo $pro_mostrar[0] ?>'>
                    <b><?php echo "ID:" . $pro_mostrar[0] //posição; 
                        ?></b>
                    <br><br><b><?php echo "Nome: "; ?></b>
                    <input type="text" name="txtnome" size="30" value='<?php echo $pro_mostrar[1] ?>'>
                    <br><br><b><?php echo "Sobrenome :"; ?></b>
                    <input type="text" name="txtsobre" size="30" value='<?php echo $pro_mostrar[2] ?>'>
                    <br><br>
                    <b><?php echo "Email:" ?></b>
                    <input type="text" name="txtEmail" size="30" value='<?php echo $pro_mostrar[3] ?>'>
                    <br><br>
                    <b><?php echo "Nascimento:" ?></b>
                    <input type="date" name="txtNasc" size="30" value='<?php echo $pro_mostrar[4] ?>'>
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