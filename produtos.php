<?php
session_start(); // Inicia a sessão

$conexao = mysqli_connect("localhost","root","","laurear");
//Verificando a conexao
if(!$conexao){
    echo'<script>window.alert("Não foi possivel conectar ao banco");</script>';
}
//caso não de erro a conexão deu certo

//Recuperando dados e consultado se ja está cadastrado

$id_produto = $_POST['id_produto'];
$nome_produto = $_POST['nome_produto'];
$pontos_produto = $_POST['pontos_produto'];
$qntd_produto = $_POST['qntd_produto'];


$sql = "SELECT * FROM laurear.produtos WHERE id_produto='$id_produto'";
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