<?php
session_start();
include 'conexao.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$data_nasc = filter_input(INPUT_POST, 'data_nasc',FILTER_SANITIZE_NUMBER_INT);
$idade = filter_input(INPUT_POST, 'idade',FILTER_SANITIZE_NUMBER_INT);
$sexo = filter_input(INPUT_POST, 'sexo',FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco',FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE cadastro SET login='$login', nivel='$nivel', nome='$nome', data_nasc='$data_nasc', idade='$idade', sexo='$sexo', endereco='$endereco' WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: usuarios.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: editarusu.php?id=$id");
}

