<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro Usuário</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #EFEAE7;">

    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="card-login col-lg-8">
                <center class="mb-4">
                    <a class="logo" href="#">Minha <span>Loja</span></a>
                </center>

                <?php
                    include "conexao.php";

                    if(isset($_POST['btn-cadastro'])){
                        $acesso = $_POST['acesso'];
                        $usuario = $_POST['usuario'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];

                        $sql = "INSERT INTO `usuarios`(`usuario`, `email`, `senha`, `acesso`) VALUES ('$usuario','$email','$senha','$acesso')";

                        $cadastrar = mysqli_query($conexao, $sql);
                    }
                ?>

                <form action="cadastro_usuario.php" method="post">

                    <div class="col-sm-6 form-group">
                        <input type="hidden" class="form-control input" value="visitante" name="acesso">
                    </div>

                    <div class="form-row">
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control input" placeholder="Nome de usuário" name="usuario" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <input type="email" class="form-control input" placeholder="Seu Email" name="email" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-6 form-group">
                            <input id="txtsenha" type="password" class="form-control input" placeholder="Senha" name="senha" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <input type="password" class="form-control input" placeholder="Confirmar senha" name="senha2" required oninput="validaSenha(this)">
                        </div>
                    </div>
                    
                    <div class="btn-submit">
                        <button type="submit" class="btn btn-primary ml" name="btn-cadastro">Cadastrar</button>
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

    <script type="text/javascript">
		function validaSenha(input){
			if (input.value != document.getElementById('txtsenha').value) {
				input.setCustomValidity('A senha não coinscide com a 1ª repita!');
			} else {
				input.setCustomValidity('');
			}
		}
	</script>
</body>
</html>