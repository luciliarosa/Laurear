<?php
session_start();

// Verificar se o ID do produto foi passado pela URL
if(isset($_GET['id_produto'])) {
    $productId = $_GET['id_produto'];
    
    // Verificar se a sessão do carrinho de compras já existe
    if(!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }
    
    // Adicionar o ID do produto ao carrinho de compras
    $_SESSION['carrinho'][] = $productId;
    
    // Retornar a quantidade de itens no carrinho de compras
    $totalItens = count($_SESSION['carrinho']);
    
    // Exibir a quantidade de itens no carrinho de compras
    echo $totalItens . ' itens no carrinho';
}
?>

<!-- Exibir a quantidade de itens no carrinho de compras -->
<div id="cart">
    <?php
    if(isset($_SESSION['carrinho'])) {
        echo count($_SESSION['carrinho']) . ' itens no carrinho';
    } else {
        echo '0 itens no carrinho';
    }
    ?>
</div>
