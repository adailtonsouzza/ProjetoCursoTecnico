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
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrador</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
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
    <div id="main" class="container-fluid" style="margin-top: 50px">

        <div id="top" class="row">
            <div class="col-sm-3">
                <h2>Usuários</h2>
                <?php
                if (isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            <div class="col-sm-6">

                <div class="input-group h2">
                    <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Usuários">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>

            </div>


        </div> <!-- /#top -->


        <hr />
        <div id="list" class="row">

            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <?php
                    if (isset($_SESSION['msg']))
                    {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nível 0: Aguardando Aprovação || Nível 1: Administrador || Nível 2: Colaborador </th>
                            <th class="actions">Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result_usuarios = "SELECT * FROM cadastro";
                        $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                        while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios))
                        {
                            ?>
                            <tr>
                                <td><?php echo $row_usuario['id'] ?></td>
                                <td><?php echo $row_usuario['nome'] ?></td>
                                <td><?php echo $row_usuario['nivel'] ?></td>
                                <td class="actions">
                                    <a class="btn btn-success btn-xs" href='view.php?id=<?php echo $row_usuario['id'] ?>'>Visualizar</a>
                                    <a class="btn btn-warning btn-xs" href='editarusu.php?id=<?php echo $row_usuario['id'] ?>'>Editar</a>
                                    <a class="btn btn-danger btn-xs"  href='prosApagarUsu.php?id=<?php echo $row_usuario['id'] ?>'>Excluir</a>
                                </td>

                            </tr>
                        <?php }
                        ?>
                    </tbody>

                </table>
            </div>

        </div>



</html>
