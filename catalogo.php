<?php
session_start(); // Inicia a sessão

// Verifica se o nome do usuário está definido na sessão
if (isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario'];
} else {
    $nome_usuario = "Nome do Usuário"; // Defina um valor padrão se o nome do usuário não estiver definido
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Principal</title>
        <link rel="stylesheet" href="catalogo/catalogo.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    </head>
    <body>
        <!-- Menu Lateral -->
                
         <div class="menu-lateral">

            <div class="btn-expandir">
                <i class="bi bi-list" id="btn-exp"></i>
            </div>
            <ul>
                <li class="iten-menu">
                    <a href="home.php">
                        <span class="icon"><i class="bi bi-house-door" ></i></span>
                        <span class="txt-link">Inicio</span>
                    </a>
                </li>

                <li class="iten-menu ativo">
                    <a href="catalogo.php">
                        <span class="icon"><i class="bi bi-bag"></i></span>
                        <span class="txt-link">Catálogo</span>
                    </a>
                </li>

                <li class="iten-menu">
                    <a href="#">
                        <span class="icon"><i class="bi bi-card-text"></i></span>
                        <span class="txt-link">Faculdade</span>
                    </a>
                </li>

                <li class="iten-menu">
                    <a href="#">
                        <span class="icon"><i class="bi bi-coin"></i></span>
                        <span class="txt-link">Extrato</span>
                    </a>
                </li>

                <li class="iten-menu">
                    <a href="#">
                        <span class="icon"><i class="bi bi-dropbox"></i></span>
                        <span class="txt-link">Pedidos</span>
                    </a>
                </li>
            </ul>
        </div> 

        <header>
            <div class="navbar">
                <img src="img/logo.png" alt="Logo da Empresa">       
            </div>

            <div class="compras">
                <i class="bi bi-cart3"></i>
            </div>
        </header>

        <main class="main-catalog">

        <nav>
                <div class="search">
                    <input id="searchInput" class="text-box" type="search" placeholder="Buscar...">
                </div>

                <script>
                        document.getElementById('searchInput').addEventListener('input', function() {
                        var searchTerm = this.value.trim(); // Obtém o valor digitado e remove espaços em branco do início e do final
                        if (searchTerm !== '') {
                            // Enviar uma solicitação AJAX para o arquivo PHP que irá processar a pesquisa
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    // Atualizar a parte da página que exibe os resultados da pesquisa com a resposta do servidor
                                    document.getElementById('searchResults').innerHTML = xhr.responseText;
                                }
                            };
                            // Definir o método e o arquivo PHP a serem usados na solicitação AJAX
                            xhr.open('GET', 'processar_pesquisa.php?searchTerm=' + searchTerm, true);
                            xhr.send();
                        } else {
                            // Se a barra de pesquisa estiver vazia, limpar os resultados da pesquisa
                            document.getElementById('searchResults').innerHTML = '';
                            }
                        });
                </script>
        </nav>
            <h2 class="titulo-catalog">Recompensas Disponíveis!</h2>
        <!-- 
            <div class="points">
                <h3> <?php echo $nome_usuario; ?></h3>
                <h4> você possui <span class="points-value"> ****</span> pontos.
                <span class="toggle-points" onclick="togglePoints()">
                    <i id="eyeIcon" class="bi bi-eye-slash"></i> </h4>
                </span>
            </div>
        -->
      
        
        <!-- Catalogo -->
        <div class="vitrine"> 
            <?php
                // Conectar ao banco de dados
                $conexao = mysqli_connect("localhost","root","","laurear");

                // Verificar a conexão
                if (mysqli_connect_errno()) {
                    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
                    exit();
                }

                // Obter o termo de pesquisa da solicitação GET
                $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

                // Consulta SQL para selecionar os dados filtrados com base no termo de pesquisa
                $sql = "SELECT * FROM produtos WHERE nome_produto LIKE '%$searchTerm%'";

                // Consulta SQL para selecionar todos os dados da tabela
                //$sql = "SELECT * FROM produtos ORDER BY nome_produto ASC";
                //$sql = "SELECT * FROM produtos WHERE nome_produto LIKE '%ifood%'";
                //$sql = "SELECT * FROM produtos WHERE nome_produto LIKE %$search%";
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

                    // Exibir os produtos
                    foreach ($vetor as $key => $produto) {
            ?>
         
            <div class="produto">   
                    <h3><?php echo $produto['nome_produto']; ?></h3>
                        <div class="box">
                            <img class="vitrine-img" src="<?php echo $produto['img_produto']; ?>" alt="Imagem do Produto">
                            
                                <div class="overlay">
                                    <h3><?php echo $produto['pontos_produto']; ?> Pontos </h3>
                                    <h5><?php echo $produto['descricao_produto']; ?></h5>
                                </div>
                        </div> 
                            <button> <a href="?adicionar=<?php echo $key; ?>">Adicionar ao carrinho</a> </button>
                </div>  
        
        <?php

                }
            } else {
                // Se a consulta falhar, exibir uma mensagem de erro
                echo "Erro ao executar a consulta: " . mysqli_error($conexao);
            }
        ?> 
        </div> 

        </main>

        <!-- Rodapé -->
        <footer>
            
            <div class="company-info">
                <p>LAUREAR. CNPJ: xx.xxx.xxx/xxxx-xx - Inscrição Estadual: xxx.xxx.xxx.xxx <br>
                O catálogo de prêmios é atualizado periódica e automaticamente pelos parceiros e os produtos e preços poderão
                sofrer
                alterações durante a navegação, <br> sem aviso prévio, devendo ser consultados pelo interessado no momento da
                conclusão <br>
                efetiva do resgate.</p>
            </div>
            <div class="footer-links">
                <a href="#">Política de Privacidade</a>
                <a href="#">Termos de Uso</a>
                <a href="#">Ajuda</a>
                <a href="#">Fale Conosco</a>
            </div>
        
        </footer>
        
        <script src="home/home.js"></script>
        <script src="js/points.js"></script>
    </body>
</html>