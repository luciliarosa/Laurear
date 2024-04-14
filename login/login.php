<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laurear Login</title>
</head>
<body>

<?php
$conexao = mysqli_connect("localhost","root","","laurear");
//Verificando a conexao
if(!$conexao){
    echo"Não Conectado";
}
echo"Conectado com sucesso ao banco de dados<br>";

//Recuperando dados e consultado se ja está cadastrado
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$cpf = mysqli_real_escape_string($conexao, $cpf);

$sql = "SELECT * from laurear.users_2 WHERE cpf='$cpf' AND senha='$senha'";
$retorno = mysqli_query($conexao, $sql);

if(mysqli_num_rows($retorno)>0){
    header('Location: /Laurear/home.html');
    echo"LOGADO COM SUCESSO<br>";
}
else{
   echo"CPF OU SENHA INCORERTO <br>";
}

?>
</body>
</html>