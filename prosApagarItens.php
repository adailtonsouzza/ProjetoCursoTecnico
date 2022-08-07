<?php
session_start();
include 'conexao.php';
$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
        $result_usuario = "DELETE FROM itens WHERE id='$id'";
        $resultado_usuario =mysqli_query($conn,$result_usuario);

        if(mysqli_affected_rows($conn)){ 
            $_SESSION['msg'] = "<p style='color:green;'>Item apagado com sucesso</p>";
                        header("Location: itensAdm.php");


        }  else{

                        $_SESSION['msg'] = "<p style='color:red;'>Erro o item não foi apagado com sucesso</p>";
                        header("Location: ItensAdm.php");
                }     
        
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Item</p>";
	header("Location: itensAdm.php");
}