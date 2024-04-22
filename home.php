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
                <li class="iten-menu ativo">
                    <a href="home.php">
                        <span class="icon"><i class="bi bi-house-door" ></i></span>
                        <span class="txt-link">Inicio</span>
                    </a>
                </li>

                <li class="iten-menu">
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
        <!-- 
            <nav>

                <div class="search">
                    <input class="text-box" type="search" placeholder="Buscar...">
                </div>
            </nav> -->
            </div>

            <div class="compras">
                <i style= "color: #ffffffb9;" class="bi bi-cart3"></i>
            </div>
            

        </header>

        <main>

            <div class="points">
                <h3> Olá! <?php echo $nome_usuario; ?></h3>
                <h4> Você possui <span class="points-value"> ****</span> pontos.
                <span class="toggle-points" onclick="togglePoints()">
                    <i id="eyeIcon" class="bi bi-eye-slash"></i> </h4><!-- Ícone do olho fechado -->
                </span>
            </div>

            <!-- Principal -->
        
            <div class="vitrine">
                <div class="box">

                    <img class="vitrine-img" src="img/Laurear_logo.png" alt="logo">
                    <div class="overlay">
                        <h3>Laurear</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Aperiam velit reprehenderit dolorem autem fugiat voluptas
                            quia molestias voluptatibus ea ut possimus consequuntur, veritatis nulla corporis, 
                            non itaque, mollitia ipsum quae.
                        </p>
                        
                    </div>
                </div>

                <div class="box">
                    
                    <img class="vitrine-img" src="img/Laurear_logo.png" alt="logo">
                    <div class="overlay">
                        <h3>Laurear 2</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Aperiam velit reprehenderit dolorem autem fugiat voluptas
                            quia molestias voluptatibus ea ut possimus consequuntur, veritatis nulla corporis, 
                            non itaque, mollitia ipsum quae.
                        </p>
                    </div>
                </div>

                <div class="box">
                      
                    <img class="vitrine-img" src="img/Laurear_logo.png" alt="logo">
                    <div class="overlay">
                        <h3>Laurear 3</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Aperiam velit reprehenderit dolorem autem fugiat voluptas
                            quia molestias voluptatibus ea ut possimus consequuntur, veritatis nulla corporis, 
                            non itaque, mollitia ipsum quae.
                        </p>
                    </div>                    
                </div>

                <div class="box">
                    
                    <img class="vitrine-img" src="img/Laurear_logo.png" alt="logo">
                    <div class="overlay">
                        <h3>Laurear 4</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Aperiam velit reprehenderit dolorem autem fugiat voluptas
                            quia molestias voluptatibus ea ut possimus consequuntur, veritatis nulla corporis, 
                            non itaque, mollitia ipsum quae.
                        </p>
                    </div>
                </div>

                <div class="box">
                    
                    <img class="vitrine-img" src="img/Laurear_logo.png" alt="logo">
                    <div class="overlay">
                        <h3>Laurear 5</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Aperiam velit reprehenderit dolorem autem fugiat voluptas
                            quia molestias voluptatibus ea ut possimus consequuntur, veritatis nulla corporis, 
                            non itaque, mollitia ipsum quae.
                        </p>
                    </div>
                </div>

                <div class="box">
                    
                    <img class="vitrine-img" src="img/Laurear_logo.png" alt="logo">
                    <div class="overlay">
                        <h3>Laurear 6</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Aperiam velit reprehenderit dolorem autem fugiat voluptas
                            quia molestias voluptatibus ea ut possimus consequuntur, veritatis nulla corporis, 
                            non itaque, mollitia ipsum quae.
                        </p>
                    </div>
                </div>           
                
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