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
        <title>Editar Usuários</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <!-- Script para maskMoney -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
        <script type="text/javascript" src="js/typeMoney.js"></script>
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
            <h3 class="page-header">Editar Item</h3>

            <form method="post" action="proItens.php">

                <?php
                if (isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>

                <div class="row">


                    <div class="form-group col-md-4">
                        <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $row_usuario['nome']; ?>" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Fabricante</label>
                        <input type="text" class="form-control" name="fabricante" value="<?php echo $row_usuario['fabricante']; ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Data de compra</label>
                        <input type="date" class="form-control" name="data" id="data" value="<?php echo $row_usuario['data']; ?>" >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Valor</label>
                        <input type="money" class="form-control" name="valor" value="<?php echo number_format($row_usuario['valor'], 2, ",", ".") ?>">
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="itensAdm.php" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>

            </form>
        </div>
    </body>

</html>



