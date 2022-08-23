<?php
//Incluindo variáveis de ambiente e banco
include('../config.php');
include('../conexoes/conexao.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo SYS_NAME; ?> - Cadastro</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav class="nav navbar-inverse">
        <div class="container-fluid">
            <!-- Agrupamento para exibição em mobile-->
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#defaultNavbar" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand">
                    <img src="../images/logochurrascopequeno.png" alt="">
                </a>
            </div> <!-- Fecha o grupamento para exibição em mobile-->
            <div class="collapse navbar-collapse" id="#defaultNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="../index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="../index.php#produtos">Produtos</a></li>
                    <li><a href="../index.php#destaques">Destaques</a></li>
                    <li><a href="../index.php#reservas">Reserva</a></li>
                    <li><a href="../index.php#contato">Contato</a></li>
                </ul>
            </div> <!-- Fecha nav a direita-->
        </div>
    </nav> <!-- Fecha barra de navegação-->
    <main class="container">
        <div class="row">
            <!-- Abre dimensionamento -->
            <div class="col-xs-12 col-sm-offset-3 col-sm-3 col-md-offset- col-md-6">
                <h2 class="breadcrumb tex-danger">
                    <a href="../index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Cadastre-se
                </h2>


                <!-- Abre thumbnail -->
                <div class="thumbnail">
                    <div class="alert alert-success" role="alert">
                        <!-- Abre formulário -->
                        <form action="cadastre-se.php" method="post" id="form_cadastre-se" name="form_cadastre-se" enctype="text/plain">
                            <label for="nome_cliente">Nome:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" maxlength="100" required placeholder="Digite o seu nome...">
                            </div>
                            <br>
                            <label for="">Telefone:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="telefone_cliente" name="telefone_cliente" maxlength="20" required placeholder="+55 DDD 999999999...">
                            </div>
                            <br>
                            <label for="">EMAIL</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="email_cliente" name="email_cliente" maxlength="100" required placeholder="email@email.com.br">
                            </div>
                            <br>
                            <label for="">SENHA</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </span>
                                <input type="password" class="form-control" id="email_cliente" name="email_cliente" maxlength="12" required placeholder="Digite a sua senha">
                            </div>
                            <br>
                            <label for="">CONFIRMAR SENHA</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </span>
                                <input type="password" class="form-control" id="email_cliente" name="email_cliente" maxlength="12" required placeholder="Confirme a sua senha">
                            </div>
                            <br>
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                        </form>
                        <!-- fecha formulário -->
                        <!-- Fecha alert-sucess -->
                    </div>
                    <!-- Fecha thumbnail -->
                </div>
                <!-- Fecha dimensionamento -->
            </div>

        </div>

            <footer>
                <?php include('../rodape.php'); ?>
            </footer>
    </main>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>