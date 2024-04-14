<?php
$conexao = mysqli_connect("localhost","root","","laurear");
//Verificando a conexao
if(!$conexao){
    echo"Não Conectado";
}
echo"Conectado com sucesso ao banco de dados";

//Recuperando dados e consultado se ja está cadastrado
$cpf = $_POST['cpf'];
$cpf = mysqli_real_escape_string($conexao, $cpf);

$sql = "SELECT * from laurear.users_2 WHERE cpf='$cpf'";
$retorno = mysqli_query($conexao, $sql);

if(mysqli_num_rows($retorno)>0){
$to = 'vict.avelino@gmail.com';
$subject = 'Recuperação de senha';
$messagem = 'Olá recentimente você solicitou a recuperação da sua senha na Plataforma Laurear';

//mail($to, $subject, $message);

//print "Enviado"
}
else{
   echo"CPF NÃO CADASTRADO <br>";
}
?>