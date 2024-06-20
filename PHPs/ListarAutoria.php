
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="../CSS//StyleAutoria.css">
</head>
<body>
<?php
include_once './Autoria.php';
$p = new Autoria();
$pro_bd = $p->listar();
?>
<center>
<div class="container">
        <h1>Relação de Autorias Cadastradas</h1>
        <table border="1">
            <tr>
                <th>Código Livro</th>
                <th>Código Autor</th>
                <th>Data Lançamento</th>
                <th>Editora</th>
            </tr>
            <?php
            foreach ($pro_bd as $pro_mostrar) {
            ?>
            <tr>
                <td><b><?php echo $pro_mostrar[0]; ?></b></td>
                <td><b><?php echo $pro_mostrar[1]; ?></b></td>
                <td><?php echo $pro_mostrar[2]; ?></td>
                <td><?php echo $pro_mostrar[3]; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div class = frase>
           <br><br><button><b><a href="../MenuLivraria.html">Voltar</a></button>
            </div></b>
        </div>
        </center>
            </section>
        </div>
    </body>
</html>
