<?php

session_start();
$nome = $_POST['nome'];
$fabricante = $_POST['fabricante'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$data = $_POST['data'];

include 'conexao.php';

if ($nome == "" || $nome == null)
{
    $_SESSION['msg'] = "<p style='color:red;'>Todos os campos devem ser preenchidos</p>";
    header("Location: novoitemAdm.php");
}
elseif ($fabricante == "" || $fabricante == null)
{

    $_SESSION['msg'] = "<p style='color:red;'>Todos os campos devem ser preenchidos</p>";
    header("Location: novoitemAdm.php");
}
elseif ($valor == "" || $valor == null)
{

    $_SESSION['msg'] = "<p style='color:red;'>Todos os campos devem ser preenchidos</p>";
    header("Location: novoitemAdm.php");
}
elseif ($quantidade == "" || $quantidade == null)
{

    $_SESSION['msg'] = "<p style='color:red;'>Todos os campos devem ser preenchidos</p>";
    header("Location: novoitemAdm.php");
}
elseif ($data == "" || $data == null)
{

    $_SESSION['msg'] = "<p style='color:red;'>Todos os campos devem ser preenchidos</p>";
    header("Location: novoitemAdm.php");
}
else
{

    // Faz retirada do "." e substitui a "," da casa decimal por "." para não ocorrer erro no Banco de Dados
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", ".", $valor);

    $query = "insert into itens(`nome`, `fabricante`, `valor`, `quantidade`, `data`)
                    values('$nome', '$fabricante', '$valor', '$quantidade', '$data')";
    $insert = mysqli_query($conn, $query);

    if ($insert)
    {
        $_SESSION['msg'] = "<p style='color:green;'>Item cadastrado com sucesso</p>";
        header("Location: novoitemAdm.php");
    }
    else
    {
        $_SESSION['msg'] = "<p style='color:red;'>Não foi possível cadastrar o item</p>";
        header("Location: novoitemAdm.php");
    }
}

