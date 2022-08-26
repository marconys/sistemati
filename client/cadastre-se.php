
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <<?php echo SYS_NAME; ?> - Cadastre-se </title>
            <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <?php include('../menu_publico.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-primary">
                    <a href="../index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Cadastre-se
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-info" role="alert">
                        <form action="cliente_insere_dados.php" method="post" id="form_cliente_insere_dados" name="form_cliente_insere_dados" enctype="multipart/form-data">
                           
                            <!-- Text nome_cliente -->
                            <label for="nome_cliente">Nome Completo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" maxlength="100" required  placeholder="Digite o seu nome e sobrenome...">
                            </div>
                            <br>
                            <!-- Text cpf_cliente -->
                            <label for="cpf_cliente">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="cpf_cliente" name="cpf_cliente" maxlength="12" required  placeholder="Digite o seu CPF sem traçoes e prontos...">
                            </div>
                            <br>
                            <!-- number email_cliente -->
                            <label for="email_cliente">E-mail:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="email_cliente" id="email_cliente" required placeholder="Ex: email@email.com..." class="form-control">
                            </div>
                            <br>
                            <!-- number senha_cliente -->
                            <label for="senha_cliente">Senha:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </span>
                                <input type="password" name="senha_cliente" id="senha_cliente" required placeholder="Digite a sua senha..." class="form-control">
                            </div>
                            <br>
                            <!-- file imagem-->
                            <label for="foto_cliente">Foto:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                </span>
                                <img src="" alt="" name="foto" id="foto" class="img-responsive">
                                <input type="file" name="foto_cliente" id="foto_cliente" class="form-control" accept="image/*">
                            </div>
                            <br>
                            <!-- Botão Enviar -->
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-success btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <?php include('../rodape.php'); ?>
        </footer>

    </main>
    <!-- Script para a imagem -->
    <script>
        document.getElementById("foto_cliente").onchange = function() {
            var reader = new FileReader();
            if (this.files[0].size > 528385) {
                alert("A imagem deve ter no máximo 500KB");
                $("#foto").attr("src", "blank");
                $("#foto").hide();
                $("#foto_cliente").wrap('<form>').closest('form').get(0).reset();
                $("#foto_cliente").unwrap();
                return false;

            }
            // Verifica se o input do titpo file possui dado
            if (this.files[0].type.indexOf("image") == -1) {
                alert("Formato inválido, escolha uma imagem!");
                $("#foto").attr("src", "blank");
                $("#foto").hide();
                $("#foto_cliente").wrap('<form>').closest('form').get(0).reset();
                $("#foto_cliente").unwrap();
                return false;
            };
            reader.onload = function(e) {
                //Obter dados  carregados e renderizar a miniatura
                document.getElementById("foto").src = e.target.result;
                $("#foto").show();
            };
            reader.readAsDataURL(this.files[0]);
        };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>