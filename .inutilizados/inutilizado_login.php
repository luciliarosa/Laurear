<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Receber os dados do formulário de forma segura
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Consulta SQL para verificar o usuário e senha
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuário autenticado, enviar resposta JSON
    echo json_encode(["status" => "success"]);
} else {
    // Usuário não encontrado ou senha incorreta, enviar resposta JSON
    echo json_encode(["status" => "error"]);
}

$conn->close();
?>