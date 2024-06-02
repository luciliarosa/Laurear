<?php
session_start(); // Inicia a sessão

// Verifica se o carrinho está definido na sessão
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="catalogo/catalogo.css">
</head>
<body>
    <header>
        <div class="navbar">
            <img src="img/logo.png" alt="Logo da Empresa">
        </div>
    </header>
    <main class="main-catalog">
        <h2 class="titulo-catalog">Seu Carrinho</h2>
        <?php if (count($carrinho) > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Imagem</th>
                        <th>Pontos</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrinho as $produtos): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produtos['nome_produto']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($produtos['img_produto']); ?>" alt="Imagem do Produto" width="50"></td>
                            <td><?php echo htmlspecialchars($produtos['pontos_produto']); ?></td>
                            <td><a href="remover_carrinho.php?id_produto=<?php echo $produtos['id_produto']; ?>">Remover</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>O carrinho está vazio.</p>
        <?php endif; ?>
    </main>
</body>
</html>