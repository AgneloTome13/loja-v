<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Minha Loja</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .img-fundo{
            width: 100%;
            height: 70%;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("img/about-img.jpg") fixed;
            background-size: cover;
            padding: 100px 0;
            color: #fff;
        }
    </style>
</head>
<body>

    <?php
        include "menu.php";
    ?>

    <!--Carousel-->
    <div id="carouselSite" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselSite" data-slide-to="0" class="active"></li>
            <li data-target="#carouselSite" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide-01.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Bem vindo a Minha Loja</h1>
                    <p class="mb-4">O espaço ideal para fazer compras sem sair de casa.</p>	
                    <div class="botao">
                        <a href="#" class="btn btn-primary btn-lg">Comprar agora</a>
                    </div>
                </div>
            </div>
            
            <div class="carousel-item">
                <img src="img/slide-02.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Bem vindo a Minha Loja</h1>
                    <p class="mb-4">O espaço ideal para fazer compras sem sair de casa.</p>	
                    <div class="botao">
                        <a href="#" class="btn btn-primary btn-lg">Comprar agora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fim Carosel-->

    <!--Cards produtos-->
    <section class="produtos">
        <div class="container">
            <div class="titulo my-5 text-center">
                <h1>Em destaque na semana</h1>
            </div>

            <div class="row">
                <?php
                    include "conexao.php";

                    $sql = "SELECT * FROM `produtos`";
                    $buscar = mysqli_query($conexao, $sql);
                    while($produto = mysqli_fetch_array($buscar)){
                ?>
                <div class="col-lg-3 col-md-6 mb-5">
                    <img src="<?php echo $produto['foto']; ?>" alt="Imagem do produto">
                    <div class="bg text-center">
                        <h5><?php echo $produto['nome']; ?></h5>
                        <p><?php echo number_format($produto['preco'],2,',','.'); ?> Kzs / kg</p>
                        
                        <?php
                            if(isset($_SESSION['nome_usuario'])){
                                echo "<a class='btn btn-primary btn-block' href='carrinho.php?acao=add&id= $id_produto'>ADD <i class='fa fa-shopping-cart'></i></a>";
                            } else{
                                echo "<a class='btn btn-primary btn-block' href='login.php'>ADD <i class='fa fa-shopping-cart'></i></a>";
                            }
                        ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--Fim Cards produtos-->

    <!--Imagem fundo-->
    <section class="img-fundo">
        <div class="container text-center">
            <h1>Ainda não possui cadastro?</h1>
            <p>Não perca aoportunidade de estar por dentro das novidades do mercado com os melhores preços.</p>
            <a href="cadastro_usuario.php" class="btn btn-primary btn-lg">Cadastrar-se</a>
        </div>
    </section>
    <!--Fim-->

    <!--Parceiros-->
    <section class="parceiros mb-5">
        <div class="container">
            <div class="titulo my-5 text-center">
                <h1>Parceiros da Loja</h1>
            </div>

            <div class="row justify-content-center">
                <div class="parc col-lg-2 col-md-4 col-6">
                    <img src="img/p1.png" alt="Parceiro 1" class="img-fluid">
                </div>

                <div class="parc col-lg-2 col-md-4 col-6">
                    <img src="img/p1.png" alt="Parceiro 1" class="img-fluid">
                </div>

                <div class="parc col-lg-2 col-md-4 col-6">
                    <img src="img/p1.png" alt="Parceiro 1" class="img-fluid">
                </div>

                <div class="parc col-lg-2 col-md-4 col-6">
                    <img src="img/p1.png" alt="Parceiro 1" class="img-fluid">
                </div>

                <div class="parc col-lg-2 col-md-4 col-6">
                    <img src="img/p1.png" alt="Parceiro 1" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!--Fim parceiros-->

   <?php
        include "footer.php";
   ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>