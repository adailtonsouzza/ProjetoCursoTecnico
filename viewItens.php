<?php
session_start();
include 'conexao.php';
if (!empty($_SESSION['usuarioNome']))
{
    echo"Usuário:" . $_SESSION['usuarioNome'] . "-Administrador do sistema. <br><hr>";
}
else
{

    $_SESSION['loginErro'] = "Área Restrita";
    header('location: index.php');
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM itens WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Itens</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">


    </head>


    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="administrativa.php"> <?php echo $_SESSION['usuarioNome']; ?> Administrador</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="administrativa.php">Início</a></li>
                        <li><a href="usuarios.php">Usuários</a></li>
                        <li><a href="itensAdm.php">Itens</a></li>
                        <li><a href="sair.php">Logoff</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main" class="container-fluid">
            <h3 class="page-header">Itens</h3>

            <div class="row">
                <div class="col-md-4">
                    <p><strong>ID</strong></p>
                    <p><?php echo $row_usuario['id']; ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Nome</strong></p>
                    <p><?php echo $row_usuario['nome']; ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Fabricante</strong></p>
                    <p><?php echo $row_usuario['fabricante']; ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Quantidade</strong></p>
                    <p><?php echo $row_usuario['quantidade']; ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Data da compra</strong></p>
                    <p><?php echo date('d/m/Y', strtotime($row_usuario['data'])) ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Valor</strong></p>
                    <td><?php echo "R$ " . number_format($row_usuario['valor'], 2, ",", ".") ?></td>
                </div>


                <hr />

                <div class="col-md-12">
                    <a href="itensAdm.php" class="btn btn-primary">Fechar</a>

                </div>
                </body>

                </html>