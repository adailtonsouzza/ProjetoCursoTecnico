<?php
session_start();
include 'conexao.php';
if (!empty($_SESSION['usuarioNome']))
{
    echo"Usuário:" . $_SESSION['usuarioNome'] . "Funcionario comum";
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
        <title>Novo Item</title>

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

            <h3 class="page-header">Adicionar Item</h3>
            <?php
            if (isset($_SESSION['msg']))
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <form action="newitem.php" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control" id="exampl" placeholder="Digite o nome" name="nome">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Fabricante</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Digite o Fabricante" name="fabricante">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Valor Unitário</label>
                        <input type="money" class="form-control" id="exampleInputEmail1" name="valor">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Quantidade</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Digite a quantidade" name="quantidade">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Data de Compra</label>
                        <input type="date" class="form-control" id="data" name="data">
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Salvar" class="btn btn-primary"></input>
                        <a href="colaborador.php" class="btn btn-default">Cancelar</a>
                    </div>
                </div>

            </form>


    </body>
</html>