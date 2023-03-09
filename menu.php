<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!--Cabeçalho-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand h1 mb-0 logo" href="#">Minha <span>Loja</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                    <spam class="navbar-toggler-icon"></spam>
                </button>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" class="active">
                            <a class="nav-link" href="index.php"><strong>Início</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobre.php"><strong>Sobre</strong></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop"><strong>Categoria</strong></a>
                            <div class="dropdown-menu">
                                <?php
                                    include "conexao.php";
                                    session_start();

                                    $sql = "SELECT * FROM `categorias`";
                                    $buscar = mysqli_query($conexao, $sql);
                                    while($categoria = mysqli_fetch_array($buscar)){
                                        $id_categoria = $categoria['id'];
                                ?>
                                
                                <a href="produto.php?categoria=<?php echo $id_categoria; ?>" class="dropdown-item"><?php echo $categoria['nome']; ?></a>
                                <?php } ?>	
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactos.php"><strong>Contactos</strong></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php

                                if(isset($_SESSION['nome_usuario'])){
                                    echo "<a class='nav-link' href='carrinho.php'><i class='fa fa-shopping-cart'></i></a>";
                                } else{
                                    echo "<a class='nav-link' href='login.php'><i class='fa fa-shopping-cart'></i></a>";
                                }
                            ?>
                        </li>
                        
                        <li class="nav-item">
                            <?php
                                if(isset($_SESSION['nome_usuario'])){
                                    echo "<form action='menu.php' method='post'><button type='submit' name='btn-logout' class='btn btn-danger'>Sair</button>
                                    </form>";
                                } else{
                                    echo "<a class='nav-link' href='login.php'><i class='fa fa-user'></i></a>";
                                }

                                if(isset($_POST['btn-logout'])){
                                    session_destroy();

                                    header("Location:index.php");
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
	</header>
    <!--Fim Cabeçalho-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>