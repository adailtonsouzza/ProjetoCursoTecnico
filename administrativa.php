<?php
session_start();
include 'conexao.php';
if(!empty($_SESSION['usuarioNome'])){
    echo"Usuário:" .$_SESSION['usuarioNome']."-Administrador do sistema. <br><hr>";


} else{
    
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
    <a class="navbar-brand" href="administrativa.php"> <?php echo $_SESSION['usuarioNome'];?> Administrador</a>
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
        
      
    </body>
    
    
</html>