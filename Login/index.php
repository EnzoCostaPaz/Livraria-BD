<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/loginStyle.css">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="login-box">
            <div class="login-header">
                <span>Login</span>
            </div>
            <form action="" method="post">
                <div class="input-inbox">
                    <input type="text" name="userTxt" id="user" class="input-field" required>
                    <label for="user" class="label">Username:</label>
                    <i class="bx bx-user icon"></i>
                </div>
                <div class="input-inbox">
                    <input type="password" name="userSenha" id="pass" class="input-field" required onkeypress="return NumOnly(window.event.keyCode)">
                    <label for="pass" class="label">Senha</label>
                    <i class="bx bx-lock-alt icon"></i>
                </div>
                <div class="input-box">
                    <input type="submit" name="submit" class="submit" value="Login">
                </div>
            </form> 
        </div>
    </div>

    <script language="javascript">
        function NumOnly(keypress) {
            if (keypress >= 48 && keypress <= 57) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <?php
    if (isset($_POST['submit'])) {
        include_once '../PHPs/Usuario.php';

        // Get user input
        $userTxt = $_POST['userTxt'];
        $userSenha = $_POST['userSenha'];

        $u = new usuario();
        $u->setUsuario($userTxt);
        $u->setSenha($userSenha);
        $pro_bd = $u->login();

        $existe = false;

        foreach ($pro_bd as $pro_mostrar) {
            $existe = true;
            ?>
            <?php
           
                header("location:../MenuLivraria.html");
        }
        if ($existe == false) {
            header("location:loginErrado.html"); // Display error message
        }
    }
    ?>
</body>
</html>
