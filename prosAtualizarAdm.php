<?php
session_start();
include 'conexao.php';
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$entrada = filter_input(INPUT_POST, 'entrada', FILTER_SANITIZE_NUMBER_INT);
$saida = filter_input(INPUT_POST, 'saida', FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "SELECT * FROM itens WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

if ($row_usuario['quantidade'] < 0){
    
    $_SESSION['msg'] = "<p style='color:red;'>Estoque está inferior a 0, não poderemos fazer a atualização</p>";
	header("Location: itensAdm.php");
    
}  elseif($entrada > 0){
$result_entrada = $entrada + $row_usuario['quantidade'];
$entrada = $result_entrada;

$result_usuario = "UPDATE itens SET quantidade='$entrada'  WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Item atualizado</p>";
	header("Location: itensAdm.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Item não foi atualizado</p>";
	header("Location: atualizarAdm.php?id=$id");
}
} elseif($saida > 0){
    
    $result_saida = $row_usuario['quantidade'] - $saida ;
    $saida= $result_saida;
    $result_usuario = "UPDATE itens SET quantidade='$saida'  WHERE id='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Item atualizado</p>";
	header("Location: itensAdm.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Item não foi atualizado</p>";
	header("Location: atualizarAdm.php?id=$id");
}
    
}
?>


