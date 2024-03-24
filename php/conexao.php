<?php
// Conectar ao banco de dados
$user = "root";
$username = "root";
$pass = "";
$data = "mysql:dbname=laurear;host=localhost;charset=utf8;";

global $pdo;

try{
    $pdo = new PDO($data, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
}
catch(PDOException $erro){
    return $erro->getMessage();
    exit;
}

?>