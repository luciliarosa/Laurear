<?php
session_start(); // Inicia a sessão
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
                </tr>
            </thead>
            <tbody>
                <!-- Loop para exibir cada produto no carrinho -->
                <?php foreach($_SESSION['carrinho'] as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['id_produto']); ?></td>
                        <td><?php echo htmlspecialchars($item['nome_produto']); ?></td>
                        <td><?php echo htmlspecialchars($item['pontos_produto']); ?></td>
                        <td><?php echo htmlspecialchars($item['qntd_produto']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>O carrinho está vazio.</p>
    <?php endif; ?>
</body>
</html>