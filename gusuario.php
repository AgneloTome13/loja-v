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
                        <h3 class="card-title">Gestão de usuários</h3>

                        <table class="table">
                            <thead>
                                <th>Usuário</th>
                                <th>Email</th>
                                <th>Acesso</th>
                                <th>Ação</th>
                            </thead>

                            <tbody>
                                <?php
                                    include "conexao.php";
                                   $sql = "SELECT * FROM `usuarios`";
                                   $buscar = mysqli_query($conexao, $sql);
                                   while($usuario = mysqli_fetch_array($buscar)){
                                        $id = $usuario['id'];

                                ?>
                                <tr>
                                    <td><?php echo $usuario['usuario']; ?></td>
                                    <td><?php echo $usuario['email']; ?></td>
                                    <td><?php echo $usuario['acesso']; ?></td>
                                    <td>
                                        <?php
                                            if($usuario['acesso']=="admin"){
                                                echo "";
                                            } else{
                                                echo "<a href='acesso_usuario.php?id= $id' class='btn btn-primary'>Mudar o acesso</a>";
                                            }
                                        ?>
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