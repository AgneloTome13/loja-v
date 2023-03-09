<!DOCTYPE html>
<html lang="pt-br">
<head>

    <title>Contactos</title>

</head>
<body>

    <?php
        include "menu.php";
    ?>

    <section class="contactos mb-5">
        <div class="barra mb-5">
            <div class="container">
                <p>Início » <span>Contactos</span></p>
            </div>
        </div>

        
        <div class="container">
            <div class="texto text-center mb-5">
                <h3>Tire as suas dúvidas</h3>
                <p>Nossos contactos estão sempre disponíveis para si.</p>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <form action="#">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="text" name="nome" required placeholder="Seu nome..." class="form-control input">
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="email" name="email" required placeholder="Seu email..." class="form-control input">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <input type="text" name="assunto" required placeholder="Assunto..." class="form-control input">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <textarea name="mensagem" class="form-control" cols="30" rows="10">Mensagem...</textarea>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4 text-center">
                    <h4>Telefone</h4>
                    <p><i class="fa fa-phone"></i> +244 123456789 / +244 123456789</p>
                    <h4>Email</h4>
                    <p><i class="fa fa-envelope" style="font-size: 16px;"></i> seunome@seuendereco.com</p>
                    <h4>Endereço</h4>
                    <p><i class=" fa fa-map-marker" style="font-size: 18px;"></i> Golf 2 - Vila Estoril, rua B, trav. 3</p>
                </div>
            </div>
        </div>
    </section>

    <?php
        include "footer.php"
    ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>