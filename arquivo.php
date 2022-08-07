<?php
session_start();

$login = $_POST['login'];
$senha = md5($_POST['senha']);
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$data_nasc = $_POST['data_nasc'];
$sexo = $_POST['sexo'];
$endereco = $_POST['endereco'];
$logarray= $array['login'];

include 'conexao.php';

$arquivo = $_FILES['arquivo']['name'];

//Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = 'foto/';
//Primeiro verifica se deve trocar o nome do arquivo
	if($UP['renomeia'] == true){
//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
	$nome_final = time().'.jpg';
	}else{
//mantem o nome original do arquivo
	$nome_final = $_FILES['arquivo']['name'];
            }

if($login==""||$login==null){
     $_SESSION['msg'] = "<p style='color:red;'>O campo login deve ser preenchido</p>";
                        header("Location: cadastrar.php");
} else{
    if($logarray==$login){
         $_SESSION['msg'] = "<p style='color:red;'>Esse login já existe</p>";
                        header("Location: cadastrar.php");
    }


else{
    
if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
            
$query = "insert into cadastro(`login`, `senha`, `nome`, `idade`, `data_nasc`, `sexo`,`endereco`,`nome_imagem`)
                    values('$login', '$senha', '$nome', '$idade', '$data_nasc', '$sexo','$endereco','$nome_final')";
                  $insert =  mysqli_query($conn, $query);
}
                    if($insert){
             $_SESSION['msg'] = "<p style='color:white;'>Usuário cadastrado com sucesso</p>";
                        header("Location: index.php");
          
                    }else{
                         $_SESSION['msg'] = "<p style='color:black;'>Não foi possível cadastrar esse usuário</p>";
                        header("Location: cadastrar.php");
        }
}
}



?>

