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
    <?php include('../menu_publico.php');?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
            <h2 class="breadcrumb tex-danger">
                        <a href="../admin/login.php">
                            <button class="btn btn-danger">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </button>
                        </a>
                        Cadastre-se
                    </h2>
            </div>
        </div>
    </main>
    <!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>

</html>