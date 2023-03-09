<!DOCTYPE html>
<html lang="pt-br">
<head>

    <title>Carrrinho</title>

</head>
<body>

    <?php
        include "menu.php";
        include "conexao.php";

        //session_start();
		//Criando a sessão caso ela ainda não exista.
		if (!isset($_SESSION['carrinho'])) {

			$_SESSION['carrinho']=array();
	
		}

		//Adicionar produto

		if (isset($_GET['acao'])) {
			//Adicionar carrinho

			if ($_GET['acao']=='add') {
				$id=intval($_GET['id']);//intval serve para verificar se o valor vindo do link é um inteiro.  

				if (!isset($_SESSION['carrinho'][$id])) {//Caso não exista um produto no carrinho rece o valor 1 que é a quantidade do produto.
					$_SESSION['carrinho'][$id]=1;
				}
				else{//Caso já exista é incrementado a quantidae que tinha antes...
					$_SESSION['carrinho'][$id] +=1;
				}
			}

			//Remover do carrinho
			if ($_GET['acao']=='del') {
				$id=intval($_GET['id']);

				if (isset($_SESSION['carrinho'][$id])) {
					unset($_SESSION['carrinho'][$id]);
				}
			}
		}
    ?>

<section class="sobre mb-5">
        <div class="barra mb-5">
            <div class="container">
                <p>Início » <span>Carrrinho</span></p>
            </div>
        </div>

        <div class="container">

            <h2>Carrinho</h2>

            <table class="table mb-2">
                <thead>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Acção</th>
                </thead>

                <form method="post" action="?acao-up">

                    <tbody>
                        <?php

                        if (count($_SESSION['carrinho'])==0) {
                            echo "<tr><td colspan='6' class='text-center'>Não foi adicionado produto no carrinho.</td></tr>";
                        }

                        else{

                            $_SESSION['dados'] = array();//Variável responsável por guardar os itens de compra para serem salvos no banco de dados...

                            $total=0;//Essa brincadeira me deu muito trabalho estava declarar dentro do foreach jajajajajajaja e não estava calcular o total, isso me deixou puto...

                            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                                $sql = "SELECT * FROM `produtos` WHERE id = $id";
                                $buscar=mysqli_query($conexao,$sql); 
                                $produto=mysqli_fetch_array($buscar);
                                $nome_produto=$produto['nome'];
                                $preco_produto= number_format($produto['preco'],2,',','.');
                                $sub=number_format($produto['preco'] * $qtd,2,',','.');

                                $total+=$produto['preco']*$qtd;

                                echo "
                                    <tr>
                                    <td>".$nome_produto."</td>
                                    <td>".$qtd." Kg</td>
                                    <td>".$preco_produto." Akzs</td>
                                    <td>".$sub." Akzs</td>
                                    <td><a href='?acao=del&id=".$id."' class='btn btn-sm btn-danger' role='button' name='btn_delete'><i class='fa fa-trash'></i>Excluir</a></td>
                                </tr>";

                                //array push comando que serve para inserir dados de um array já existente, informa-se o array que será preenchido.
                                array_push(
                                    $_SESSION['dados'], 
                                    array(
                                        'nome_produto' => $nome_produto,
                                        'quantidade' => $qtd,
                                        'preco' => $preco_produto,
                                        '$subtotal' => $sub,
                                        'total' => $total,
                                    )
                                );

                                //var_dump($_SESSION['dados']);
                            }

                            $total=number_format($total,2,',','.');

                            echo "<th>
                                <td colspan='6' class='text-center'>Total a pagar ".$total." Akzs</td>	
                            </th>";
                        }
                    ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-center">
                                <a href="finalizar_compra.php?total=<?php echo $total ?>" class="btn btn-primary" role="button">Finalizar compra</a>
                            </td>
                        </tr>
                    </tfoot>
                </form>
            </table>
        </div>
    </section>



    <?php
        include "footer.php";
    ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>