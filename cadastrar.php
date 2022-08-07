<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>
        <?php
        ?>


        <form method="post" action="arquivo.php" enctype="multipart/form-data">
            <div class="login-box">
                <h1>Criar Cadastro</h1>
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

                    <input type="text" placeholder="Login" name='login'>

                </div>

                <div class="textbox">

                    <input type="password" placeholder="Password" name='senha'>
                </div>
                <div class="textbox">

                    <input type="text" placeholder="Nome" name='nome'>
                </div>
                <div class="textbox">

                    <input type="text" placeholder="Idade" name='idade'>
                </div>
                <div class="textbox">

                    <input type="date"  placeholder="DataDeNascimento" name='data_nasc'>
                </div>
                <div class="textbox">
                    <select class="btn-1" name="sexo">
                        <option name="sexo" selected>Sexo...</option>
                        <option name="sexo" value="m">Masculino</option>
                        <option name="sexo" value="f">Feminino</option>
                    </select>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Endereço" name='endereco'>
                </div>
                <div class="btn-upload">
                    <label for='btn-upload' style="cursor: pointer;">Selecione uma Imagem &#187;</label>
                    <input id='btn-upload' type='file' name="arquivo">
                </div>
                <input type="submit" class="btn" value="Salvar">

            </div>

        </form>
    </body>
</html>
