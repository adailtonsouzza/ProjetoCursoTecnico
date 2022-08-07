<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>

        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <form method="post" action="login.php">
            <div class="login-box">
                <h1>Login</h1>
                <?php
                if (isset($_SESSION['loginErro']))
                {
                    echo $_SESSION['loginErro'];
                    unset($_SESSION['loginErro']);
                }
                ?>
                <?php
                if (isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Login" name='login'>
                </div>

                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name='senha'>
                </div>

                <input type="submit" class="btn" value="Entrar" name="btnLogin" id="entar">
                <a href="cadastrar.php"> <input type="button" class="btn" value="Cadastrar"> </a>
            </div>
        </form>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
