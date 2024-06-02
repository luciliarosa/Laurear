<?php
session_start(); // Inicia a sessão

// Verifica se o ID do produto foi passado pela URL para remover do carrinho
if (isset($_GET['id_produto'])) {
    $id_produto = $_GET['id_produto'];

    // Percorre o carrinho e remove o item correspondente
    foreach ($_SESSION['carrinho'] as $key => $item) {
        if ($item['id_produto'] == $id_produto) {
            unset($_SESSION['carrinho'][$key]);
            // Reindexa o array do carrinho
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
            break;
        }
    }
}

// Redireciona de volta para a página do carrinho
header('Location: carrinho.php');
exit;
?>