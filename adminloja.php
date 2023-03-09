<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

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
        <div class="row">

            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Usuários</h3>
                        <?php
                            if($_SESSION['nivel_acesso'] == "admin"){
                                echo "<a href='gusuario.php' class='btn btn-primary'>Gerir</a>";
                            }else{
                                echo "<p>Sem permissão para alterações</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Categorias</h3>
                        <a href="gcategoria.php" class="btn btn-primary">Gerir</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Produtos</h3>
                        <a href="gprodutos.php" class="btn btn-primary">Gerir</a>
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