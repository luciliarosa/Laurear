<?php
// Conectar ao banco de dados
$conexao = mysqli_connect("localhost","root","","laurear");

//Verificando a conexao
if(!$conexao){
    echo'<script>window.alert("Não foi possivel conectar ao banco");</script>';
}
//caso não de erro a conexão deu certo


// Consulta SQL para selecionar todos os dados da tabela
$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);

// Verificar se a consulta foi bem-sucedida
if ($resultado) {
    // Inicializar um vetor para armazenar os dados
    $vetor = array();

    // Iterar sobre os resultados e adicionar cada linha ao vetor
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $vetor[] = $linha;
    }

    // Liberar o resultado da consulta
    mysqli_free_result($resultado);

    // Fechar a conexão com o banco de dados
    mysqli_close($conexao);

    // Exibir o vetor (opcional)
    print_r($vetor);
} else {
    // Se a consulta falhar, exibir uma mensagem de erro
    echo "Erro ao executar a consulta: " . mysqli_error($conexao);
}

?>