<?php
session_start(); // Inicia a sessão

// Verifica se um produtos para remoção foi passado via GET
if(isset($_GET['remove'])) {
    $removeId = $_GET['remove'];
    
    // Percorre o carrinho e remove o produtos correspondente
    foreach($_SESSION['carrinho'] as $key => $produtos) {
        if($produtos['id_produto'] == $removeId) {
            unset($_SESSION['carrinho'][$key]);
            // Reindexa o array do carrinho
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
</head>
<body>
    <h1>Carrinho de Compras</h1>
    
    <!-- Verifica se o carrinho contém itens -->
    <?php if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Pontos</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop para exibir cada produto no carrinho -->
                <?php foreach($_SESSION['carrinho'] as $produtos): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produtos['id_produto']); ?></td>
                        <td><?php echo htmlspecialchars($produtos['nome_produto']); ?></td>
                        <td><?php echo htmlspecialchars($produtos['pontos_produto']); ?></td>
                        <td><?php echo htmlspecialchars($produtos['qntd_produto']); ?></td>
                        <td>
                            <a href="?remove=<?php echo htmlspecialchars($produtos['id_produto']); ?>">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>O carrinho está vazio.</p>
    <?php endif; ?>
</body>
</html>