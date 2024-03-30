<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$conexao = mysqli_connect("localhost","root","","laurear");
//verificando a conexao
if(!$conexao){
    echo"Não Conectado";
}
echo"Conectado com sucesso ao banco de dados";

//recuperando dados e consultado se ja está cadastrado
$cpf = $_POST['cpf'];
$cpf = mysqli_real_escape_string($conexao, $cpf);

$sql = "SELECT cpf from laurear.users_2 WHERE cpf='$cpf'";
$retorno = mysqli_query($conexao, $sql);

if(mysqli_num_rows($retorno)>0){
    echo"CPF JÁ CADASTRADO <br>";
}
else{
   $cpf = $_POST['cpf']; 
   $email = $_POST['email']; 
   $nome = $_POST['nome']; 
   $senha = $_POST['senha'];

   $sql = "INSERT INTO laurear.users_2(cpf, email, nome, senha) values('$cpf', '$email', '$nome', '$senha')";
   $resultado = mysqli_query($conexao, $sql);
   echo"USUARIO CADASTRADO COM SUCESSO! <br>";
}



?>
    
</body>
</html>