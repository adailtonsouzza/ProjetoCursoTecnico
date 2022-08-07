<?php
session_start();
include'conexao.php';

if((isset($_POST['login'])) && (isset($_POST['senha']))){
     $usuario = mysqli_real_escape_string($conn, $_POST['login']);
     $senha = mysqli_real_escape_string($conn, $_POST['senha']);
     $senha = md5($senha);
     
        $sql = "SELECT * FROM cadastro WHERE login = '$usuario' && senha = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if (empty($resultado)){
            
            $_SESSION['loginErro'] = "Usuário ou senha inválida";
            header("location:index.php");
        }elseif(!empty($resultado)){
             $_SESSION['usuarioNiveis'] = $resultado['nivel'];
             $_SESSION['usuarioNome']= $resultado['nome'];
             $_SESSION['usuarioLogin']= $resultado['login'];
             $_SESSION['usuarioSenha']= $resultado['senha'];
          
             if($_SESSION['usuarioNiveis'] == "1"){
                header("Location: administrativa.php");
            }elseif($_SESSION['usuarioNiveis'] == "2"){
                header("Location: colaborador.php");
            }else{
                header("Location: aguardandoAprovacao.php");
            }
        }
     
}else{
    $_SESSION['loginErro'] = "Usuário ou senha inválido";
    header("location:index.php");
}