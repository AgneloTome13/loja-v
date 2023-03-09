<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerir Categoria</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #EFEAE7;">

    <header class="mb-5">
        <nav style="background-color: #fff; ">
            <div class="container">
                <ul style="display:flex; justify-content:space-between; align-items: center;">
                    <li class="admin-li">
                        <?php 
                            session_start(); 
                            echo $_SESSION['nome_usuario'];
                            
                            if(isset($_POST['btn-logout'])){
                                session_destroy();
                                header("Location:index.php");
                            }
                        ?>
                    </li>

                    <form action="adminloja.php" method="post">
                        <input name="btn-logout" type="submit" class="btn btn-danger mt-3" value="Logout">
                    </form>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <a href="adminloja.php" class="btn btn-primary">Voltar</a>
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Adicionar categoria</h3>

                        <?php
                            include "conexao.php";

                            //Adicionar
                            if(isset($_POST['btn-adicionar'])){
                                $nome_categoria = $_POST['nome'];

                                $sql_inserir = "INSERT INTO `categorias`(`nome`) VALUES ('$nome_categoria')";

                                $inserir = mysqli_query($conexao, $sql_inserir);
                            }

                            //Remover
                            if(isset($_GET['id'])){
                                $id_categoria = $_GET['id'];

                                $sql_deletar = "DELETE FROM `categorias` WHERE id = $id_categoria";

                                $deletar=mysqli_query($conexao, $sql_deletar);

                            }
                        ?>

                        <form method="post" action="gcategoria.php">
                            <div class="form-group">
                                <input type="text" name="nome" class="form-control input" placeholder="Nome da categoria">
                            </div>
                            <button type="submit" class="btn btn-primary" name="btn-adicionar">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Listar Categorias</h3>
                        <table class="table">
                            <thead>
                                <th>Nome categoria</th>
                                <th>Ação</th>
                            </thead>

                            <tbody>
                                <?php
                                    $sql_buscar = "SELECT * FROM `categorias`";
                                    $buscar = mysqli_query($conexao, $sql_buscar);
                                    while($categoria = mysqli_fetch_array($buscar)){

                                ?>
                                <tr>
                                    <td><?php echo $categoria['nome']; ?></td>
                                    <td>
                                        <a href="gcategoria.php?id=<?php echo $categoria['id']; ?>" class="btn btn-primary"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>