<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
        include "menu.php";
        include "conexao.php";
    ?>

    <section class="sobre mb-5">
        <div class="barra mb-5">
            <div class="container">
                <p>Início » <span>Produtos</span></p>
            </div>
        </div>

        <!--Cards produtos-->
        <div class="produtos">
            <div class="container">

                <div class="row">
                    <?php
                        if(isset($_GET['categoria'])){
                            $id_categoria = $_GET['categoria'];

                            $sql = "SELECT * FROM `produtos` WHERE categoria_id ='$id_categoria'";
                            $buscar = mysqli_query($conexao, $sql);
                        }
                        
                        while($produto = mysqli_fetch_array($buscar)){
                            $id_produto = $produto['id'];
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
        </div>
    </section>
    <!--Fim Cards produtos-->

    <?php
        include "footer.php"
    ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>