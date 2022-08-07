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
        <div id="main" class="container-fluid" style="margin-top: 50px">

            <div id="top" class="row">
                <div class="col-sm-3">
                    <h2>Itens</h2>
                </div>
                <div class="col-sm-6">

                    <div class="input-group h2">
                        <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>

                </div>
                <div class="col-sm-3">
                    <a href="novoitemAdm.php" class="btn btn-primary pull-right h2">Novo Item</a>
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
                                <th>Fabricante</th>
                                <th>Valor</th>
                                <th>Quantidade</th>
                                <th>Data de Compra</th>
                                <th class="actions">Ações</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result_usuarios = "SELECT * FROM itens";
                            $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                            while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row_usuario['id'] ?></td>
                                    <td><?php echo $row_usuario['nome'] ?></td>
                                    <td><?php echo $row_usuario['fabricante'] ?></td>
                                    <td><?php echo "R$ " . number_format($row_usuario['valor'], 2, ",", ".") ?></td>
                                    <td><?php echo $row_usuario['quantidade'] ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row_usuario['data'])) ?></td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-xs" href='viewItens.php?id=<?php echo $row_usuario['id'] ?>'>Visualizar</a>
                                        <a class="btn btn-warning btn-xs" href='editarItens.php?id=<?php echo $row_usuario['id'] ?>'>Editar</a>
                                        <a class="btn btn-danger btn-xs"  href='prosApagarItens.php?id=<?php echo $row_usuario['id'] ?>'>Excluir</a>
                                        <a class="btn btn-success btn-xs" href='atualizarAdm.php?id=<?php echo $row_usuario['id'] ?>'>Atualizar Estoque</a>
                                    </td>
                                </tr>
                                <?php }
                            ?>
                        </tbody>

                    </table>
                </div>

            </div> <!-- /#list -->

            <div id="bottom" class="row">
                <div class="col-md-12">
                    <ul class="pagination">
                        <li class="disabled"><a>&lt; Anterior</a></li>
                        <li class="disabled"><a>1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
                    </ul><!-- /.pagination -->
                </div>
            </div> <!-- /#bottom -->
        </div>

    </body>




</html>
