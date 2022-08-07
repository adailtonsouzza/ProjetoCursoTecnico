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
$result_usuario = "SELECT * FROM cadastro WHERE id = '$id'";
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
            <h3 class="page-header">Editar Usuário</h3>

            <form method="post" action="pros.php">

                <?php
                if (isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
                <div class="row">


                    <div class="form-group col-md-4">
                        <label>Login</label>
                        <input type="text" class="form-control" name="login" value="<?php echo $row_usuario['login']; ?>" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $row_usuario['nome']; ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Data de nascimento</label>
                        <input type="date" class="form-control" name="data_nasc" id="data" value="<?php echo $row_usuario['data_nasc']; ?>" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Idade</label>
                        <input type="text" class="form-control" name="idade" value="<?php echo $row_usuario['idade']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Sexo</label>
                        <select class="form-control" name="sexo">
                            <option name="sexo" selected>Escolha...</option>
                            <option name="sexo" value="m">Masculino</option>
                            <option name="sexo" value="f">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?php echo $row_usuario['endereco']; ?>">
                    </div>
                </div>
                <div class="form-group">

                    <label>Previlégios</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="nivel" value="0"> Inativo
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="nivel" value="1"> Administrador
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="nivel" value="2"> Colaborador
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="usuarios.php" class="btn btn-default">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </body>

</html>

