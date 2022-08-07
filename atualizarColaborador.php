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
        <title>Atualizar</title>

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
                    <a class="navbar-brand" href="colaborador.php"> <?php echo $_SESSION['usuarioNome']; ?> Colaborador</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="colaborador.php">Início</a></li>
                        <li><a href="colaborador.php">Itens</a></li>
                        <li><a href="sair.php">Logoff</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main" class="container-fluid">
            <h3 class="page-header">Atualizar quantidade do estoque</h3>

            <form method="post" action="prosAtualizar.php">

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
                        <label>Entrada</label>
                        <input type="text" class="form-control" name="entrada" value= >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Saída</label>
                        <input type="text" class="form-control" name="saida">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="colaborador.php" class="btn btn-default">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </body>

</html>







