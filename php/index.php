<?php
require('./conexao.php');

header('Cache-Control: no-cahce, must-revalidate');
header('Content-Type: application/json');
header("HTTP/1.1 200 OK");

if($_SERVER["REQUEST_METHOD"] === "POST"){
    //Recuperar os dados do formulario
    $mail = $_POST["mail"];
    $pass = $_POST["pass"];
    $start = "ativo";

    //Buscando Usuario no mysql
    $sql = "SELECT * FROM users WHERE user_mail = ? AND user_pass = ? AND user_status = ?";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $mail);
    $stm->bindValue(2, $pass);
    $stm->bindValue(3, $start);
    if($stm->execute()){
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        $rusid = $res['user_id'];
        $rusnm = $res['user_name'];
        $rmail = $res['user_mail'];
        $rmsgn = "Usuario Logado com sucesso";
    }
    else{
        $rlogd = "nologed";
        $rusid = null;
        $rusnm = "notname";
        $rmail = "notmail";
        $rmsgn = "Não foi possivel completar a operação";
    }
    //Colocando dados em um Array
    $data = array(
        'logd' => $rlogd,
        'usid' => $rusid,
        'rusnm' => $rusnm,
        'rmail' => $rmail,
        'msgn' => $rmsgn
    );
    //Convertendo para JSON + Retornando dados
    $json = json_encode($data);
    echo $json;   
}