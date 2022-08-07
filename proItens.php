<?php

session_start();
include 'conexao.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$fabricante = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_NUMBER_INT);
$valor = filter_input(INPUT_POST, 'valor');


// Faz retirada do "." e substitui a "," da casa decimal por "." para não ocorrer erro no Banco de Dados
$valor = str_replace(".", "", $valor);
$valor = str_replace(",", ".", $valor);

$result_usuario = "UPDATE itens SET nome='$nome', fabricante='$fabricante', data='$data', valor='$valor'  WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_affected_rows($conn))
{
    $_SESSION['msg'] = "<p style='color:green;'>Item editado com sucesso</p>";
    header("Location: itensAdm.php");
}
else
{
    $_SESSION['msg'] = "<p style='color:red;'>Item não foi editado com sucesso</p>";
    header("Location: editarItens.php?id=$id");
}

