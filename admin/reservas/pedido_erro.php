<?php 
//Variável de ambiente
include('../../config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Após 15 segundo a página será redirecionada para index.php-->
    <meta http-equiv="refresh" content="3;URL=../../client/nova_reserva.php">
    <title>
        <?php echo SYS_NAME; ?> - Erro </title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </a>
                    O prazo mínimo de antecedência é de 12 dias e o máxio 60 dias!
                </h2>                
    </main>
</body>

</html>