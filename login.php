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

    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="card-login col-lg-6">
                <center class="mb-4">
                    <a class="logo" href="#">Minha <span>Loja</span></a>
                </center>

                <?php
                    include "conexao.php";

                    if(isset($_POST['btn-logar'])){
                        $email_usuario=$_POST["email"];
                        $senha_usuario=$_POST["senha"];

                        $sql="SELECT * FROM `usuarios` WHERE email='$email_usuario' AND senha='$senha_usuario'";

                        $buscar=mysqli_query($conexao,$sql);

                        $linhas=mysqli_fetch_array($buscar);

                        if ($linhas==0) {
                            $erro="<p>Nome ou senha inválida!</p>";
                        }
                        else{     
                            session_start();
                            $_SESSION['nome_usuario'] = $linhas['usuario'];
                            $_SESSION['nivel_acesso'] = $linhas['acesso'];
                            
                            header("Location:adminloja.php");
                        }

                        if($linhas['acesso']=="visitante"){
                            session_start();
                            $_SESSION['nome_usuario'] = $linhas['usuario'];

                            header("Location:index.php");
                        }
                    }
                ?>

                <form action="login.php" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control input" placeholder="Digite o email" name="email" require>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control input" placeholder="Digite a senha" name="senha" require>
                    </div>
                    
                    <div class="erro">
                        <?php
                            if (isset($erro)) {
                                echo $erro;
                            }
                        ?>
                    </div>

                    <div class="btn-submit">
                        <button type="submit" class="btn btn-primary ml" name="btn-logar">Iniciar Sessão</button>
                        <a href="cadastro_usuario.php" class="mr">Ainda não tem cadastro? </a>
                    </div>

                </form>
            </div>
        </div>
        <center>
            <a href="index.php">Voltar no início</a>
        </center>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>