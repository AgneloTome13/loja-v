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
        <a href="adminloja.php" class="btn btn-primary mb-3">Voltar</a>
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Adicionar Produto</h3>
                        <?php
                            include "conexao.php";

                            if(isset($_POST['btn-adicionar'])){
                                $vetFoto=array();
                                $iFoto=0;
                                $qtdFoto=1;
                                $dir='img/';

                                for ($iFoto=0; $iFoto < $qtdFoto ; $iFoto++) { 

                                    if ($_FILES['foto'.($iFoto+1)]['name']!="") {
                                        
                                        $ext=strtolower(substr($_FILES['foto'.($iFoto+1)]['name'], -4));

                                        $novo_nome=uniqid().$ext;

                                        move_uploaded_file($_FILES['foto'.($iFoto+1)]['tmp_name'], $dir.$novo_nome);

                                        $vetFoto[$iFoto]="$dir"."$novo_nome";

                                    } else{

                                        $vetFoto[$iFoto]="";
                                    }
                                }

                                $cat_id = $_POST['categoria_id'];
                                $nome_produto = $_POST['nome'];
                                $preco_produto = $_POST['preco'];
                                $foto = $vetFoto[0];

                                $sql_inserir = "INSERT INTO `produtos`(`categoria_id`, `nome`, `preco`, `foto`) VALUES ('$cat_id','$nome_produto','$preco_produto','$foto')";

                                $inserir = mysqli_query($conexao, $sql_inserir);
                            }

                            //Deletar
                            if(isset($_GET['id'])){
                                $id_produto = $_GET['id'];

                                $sql_delete = "DELETE FROM `produtos` WHERE id = $id_produto";

                                $delete = mysqli_query($conexao, $sql_delete);

                                header("Location:gprodutos.php");
                            }
                        ?>

                        <form action="gprodutos.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label>Categoria</label>
                                    <select name="categoria_id" id="" class="form-control input">
                                        <option>Escolha a categoria</option>

                                        <?php
                                            $sql_op = "SELECT * FROM `categorias`";
                                            $buscar_op = mysqli_query($conexao, $sql_op);

                                            while($categoria = mysqli_fetch_array($buscar_op)){
                                        ?>

                                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>Nome</label>
                                    <input type="text" name="nome" class="form-control input" placeholder="Nome do produto">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label>Preço</label>
                                    <input type="number" name="preco" class="form-control input">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>Foto do produto</label>
                                    <input type="file" name="foto1" class="form-control input">
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" name="btn-adicionar">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Listar Produtos</h3>
                        <table class="table">
                            <thead>
                                <th>Nome categoria</th>
                                <th>Nome Produto</th>
                                <th>preço</th>
                                <th>Foto</th>
                                <th>Ação</th>
                            </thead>

                            <tbody>
                                <?php
                                    $sql_prod = "SELECT * FROM `produtos`"; 
                                    $buscar_prod = mysqli_query($conexao, $sql_prod);

                                    while($produto = mysqli_fetch_array($buscar_prod)){
                                        $categoria_id = $produto['categoria_id'];
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                            $sql_categoria = "SELECT * FROM `categorias` WHERE id = $categoria_id";
                                            
                                            $categoria = mysqli_query($conexao, $sql_categoria);

                                            $categoria_busca = mysqli_fetch_array($categoria);

                                            echo $categoria_busca['nome']; 
                                        ?>
                                    </td>
                                    <td><?php echo $produto['nome']; ?></td>
                                    <td><?php echo $produto['preco']; ?> kzs / kg</td>
                                    <td><img src="<?php echo $produto['foto']; ?>" alt="Foto do produto" height="100" width="100" class="img-fluid"></td>
                                    <td>
                                        <a href="gprodutos.php?id=<?php echo $produto['id']; ?>" class="btn btn-primary"><i class="fa fa-times"></i></a>
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