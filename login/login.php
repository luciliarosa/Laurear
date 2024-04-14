<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laurear Login</title>
</head>
<body>

<?php
session_start(); // Inicia a sessão

$conexao = mysqli_connect("localhost","root","","laurear");
//Verificando a conexao
if(!$conexao){
    echo'<script>window.alert("Não foi possivel conectar ao banco");</script>';
}
//caso não de erro a conexão deu certo

//Recuperando dados e consultado se ja está cadastrado
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$cpf = mysqli_real_escape_string($conexao, $cpf);

$sql = "SELECT * FROM laurear.users_2 WHERE cpf='$cpf' AND senha='$senha'";
$retorno = mysqli_query($conexao, $sql);

if (mysqli_num_rows($retorno) > 0) {
    // Se o login for bem-sucedido, armazene o nome do usuário na sessão
    $usuario = mysqli_fetch_assoc($retorno);
    $_SESSION['nome_usuario'] = $usuario['nome'];
    header('Location: /Laurear/home.php');
    exit; // Certifique-se de sair do script após redirecionar para evitar execução adicional de código
} else {
    echo '<script>window.alert("CPF OU SENHA INCORRETO"); window.location.href = "/Laurear/login.html";</script>';
}

?>
</body>
</html>