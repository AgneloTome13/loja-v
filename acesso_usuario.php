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
        <a href="gusuario.php" class="btn btn-primary">Voltar</a>
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Alterando o Acesso</h3>

                        <?php
                            include "conexao.php";
                            
                            $id_usuario = $_GET['id'];

                            if(isset($_POST['btn-alterar'])){
                                $id = $_POST['id'];
                                $nivel_acesso = $_POST['acesso'];

                                $sql_altera = "UPDATE `usuarios` SET `acesso`='$nivel_acesso' WHERE id = $id";

                                $altera = mysqli_query($conexao, $sql_altera);

                                header("Location:gusuario.php");
                            }
                        ?>

                        <div class="usuario">
                            <?php
                                $sql_busca = "SELECT * FROM `usuarios` WHERE id = $id_usuario";

                                $busca = mysqli_query($conexao, $sql_busca);

                                $busca_usuario = mysqli_fetch_array($busca);
                            ?>

                            <p>Nome do usuário: <?php echo $busca_usuario['usuario']; ?></p>

                            <p>Acesso actual: <?php echo $busca_usuario['acesso']; ?></p>
                        </div>

                        <form action="acesso_usuario.php" method="post">

                            <input name="id" type="hidden" value="<?php echo $id_usuario ?>">

                            <select class="form-control mb-3" name="acesso" >
                                <option value="admin">Administrador</option>
                                <option value="comum">Comum</option>
                                <option value="visitante">Visitante</option>
                            </select>

                            <button type="submit" class="btn btn-primary" name="btn-alterar">Alterar</button>
                        </form>
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