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
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="../index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Cadastre-se
                </h2>
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