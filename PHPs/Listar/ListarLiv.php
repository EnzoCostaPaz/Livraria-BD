<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="../../CSS/Listargem/StyleLista.css">
</head>
<body>
<?php
include_once '../Livros.php';
$p = new livro();
$pro_bd = $p->listar();
?>
<center>
<div class="container">
        <h1>Relação de Livros Cadastrados</h1>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>ISBN</th>
                <th>Idioma</th>
                <th>Qtde Paginas</th>
            </tr>
            <?php
            foreach ($pro_bd as $pro_mostrar) {
            ?>
            <tr>
                <td><b><?php echo $pro_mostrar[0]; ?></b></td>
                <td><?php echo $pro_mostrar[1]; ?></td>
                <td><?php echo $pro_mostrar[2]; ?></td>
                <td><?php echo $pro_mostrar[3]; ?></td>
                <td><?php echo $pro_mostrar[4]; ?></td>
                <td><?php echo $pro_mostrar[5]; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <br><br>
        <div class="frase">
            <button><b><a href="../../MenuLivraria.html">Voltar</a></b></button>
        </div>
    </div>
</center>
           
        </section>
    </body>
</html>
