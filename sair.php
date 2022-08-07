<?php
session_start();

unset(
         $_SESSION['usuarioNome'],
         $_SESSION['usuarioLogin'],
         $_SESSION['usuarioSenha']
        
        
        );
        $_SESSION['loginErro'] = "Deslogado com sucesso";
        header('location: index.php');
?>

